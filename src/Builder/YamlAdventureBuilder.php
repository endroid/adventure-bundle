<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Builder;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Entity\AdventureInterface;
use Endroid\AdventureBundle\Entity\Character;
use Endroid\AdventureBundle\Entity\Item;
use Endroid\AdventureBundle\Entity\Location;
use Endroid\AdventureBundle\Exception\InvalidPathException;
use Symfony\Component\Yaml\Yaml;

class YamlAdventureBuilder implements AdventureBuilderInterface
{
    private $path;
    private $references;

    public function __construct()
    {
        $this->references = [];
    }

    public function setPath(string $path): void
    {
        if (!is_dir($path)) {
            throw InvalidPathException::createForPath($path);
        }

        $this->path = realpath($path);
    }

    private function loadYaml(string $name): array
    {
        $yaml = Yaml::parse(strval(file_get_contents($this->path.DIRECTORY_SEPARATOR.$name.'.yaml')));

        return $yaml[$name];
    }

    public function build(string $id): AdventureInterface
    {
        $this->setPath(__DIR__.'/../Resources/data/'.$id);

        $adventure = $this->createAdventure($id);
        $this->createLocations($adventure);
        $this->createItems($adventure);
        $this->createControllableCharacters($adventure);
        $this->createOtherCharacters($adventure);

        return $adventure;
    }

    private function createAdventure(string $id): AdventureInterface
    {
        $adventureData = $this->loadYaml('adventure');

        $adventure = new Adventure($id, $adventureData['name']);

        return $adventure;
    }

    private function createLocations(AdventureInterface $adventure): void
    {
        $yaml = $this->loadYaml('locations');

        foreach ($yaml as $locationKey => $locationData) {
            $location = new Location($locationKey, $locationData['name']);
            $adventure->addLocation($location);
            $this->references[$locationKey] = $location;
        }
    }

    private function createItems(AdventureInterface $adventure): void
    {
        $yaml = $this->loadYaml('items');

        foreach ($yaml as $itemKey => $itemData) {
            $item = new Item($itemKey, $itemData['name']);
            $item->setItemContainer($this->getReference($itemData['item_container']));
            $this->setReference($itemKey, $item);
        }
    }

    private function createControllableCharacters(AdventureInterface $adventure): void
    {
        $yaml = $this->loadYaml('controllable_characters');

        foreach ($yaml as $characterKey => $characterData) {
            $character = new Character($characterKey, $characterData['name']);
            $character->setLocation($this->getReference($characterData['location']));
            $adventure->addControllableCharacter($character);
            $this->setReference($characterKey, $character);
        }
    }

    private function createOtherCharacters(AdventureInterface $adventure): void
    {
        $yaml = $this->loadYaml('other_characters');

        foreach ($yaml as $characterKey => $characterData) {
            $character = new Character($characterKey, $characterData['name']);
            $character->setLocation($this->getReference($characterData['location']));
            $adventure->addOtherCharacter($character);
            $this->setReference($characterKey, $character);
        }
    }

    private function setReference(string $key, $object): void
    {
        $this->references[$key] = $object;
    }

    private function getReference(string $key)
    {
        return $this->references[$key];
    }
}
