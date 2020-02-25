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
use Endroid\AdventureBundle\Entity\Character;
use Endroid\AdventureBundle\Entity\Location;
use Symfony\Component\Yaml\Yaml;

class YamlAdventureBuilder implements AdventureBuilderInterface
{
    private $basePath = __DIR__.'/../Resources/data';

    public function build(string $id): Adventure
    {
        $locations = $this->createLocations($id);
        $characters = $this->createCharacters($id);

        $adventureData = $this->loadYaml($id, 'adventure');

        return new Adventure(
            $id,
            $adventureData['name'],
            $characters,
            $locations
        );
    }

    private function createLocations(string $adventureId): array
    {
        $data = $this->loadYaml($adventureId, 'locations');

        $locations = [];
        foreach ($data as $id => $locationData) {
            $locations[] = new Location($id, $locationData['name']);
        }

        return $locations;
    }

    private function createCharacters(string $adventureId): array
    {
        $data = $this->loadYaml($adventureId, 'characters');

        $characters = [];
        foreach ($data as $id => $characterData) {
            $characters[] = new Character($id, $characterData['name']);
        }

        return $characters;
    }

    private function loadYaml(string $id, string $name): array
    {
        return Yaml::parse(strval(file_get_contents($this->basePath.DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$name.'.yaml')));
    }
}
