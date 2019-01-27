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
use Endroid\AdventureBundle\Entity\Item;
use Endroid\AdventureBundle\Entity\Location;
use Endroid\AdventureBundle\Entity\RandomAdventure;
use Faker\Factory;
use Ramsey\Uuid\Uuid;

class RandomAdventureBuilder
{
    private $mainCharacterCount;
    private $otherCharacterCount;
    private $locationCount;
    private $itemCount;

    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en');
    }

    public function setMainCharacterCount(int $mainCharacterCount): self
    {
        $this->mainCharacterCount = $mainCharacterCount;

        return $this;
    }

    public function setOtherCharacterCount(int $otherCharacterCount): self
    {
        $this->otherCharacterCount = $otherCharacterCount;

        return $this;
    }

    public function setLocationCount(int $locationCount): self
    {
        $this->locationCount = $locationCount;

        return $this;
    }

    public function setItemCount(int $itemCount): self
    {
        $this->itemCount = $itemCount;

        return $this;
    }

    public function build(): Adventure
    {
        $adventure = new RandomAdventure($this->createId(), $this->faker->city.' '.$this->faker->buildingNumber);

        $this->buildLocations($adventure);

        for ($i = 0; $i < $this->mainCharacterCount; ++$i) {
            $mainCharacter = new Character($this->createId(), $this->faker->firstName, $adventure->getRandomLocation());
            $adventure->addMainCharacter($mainCharacter);
        }

        for ($i = 0; $i < $this->otherCharacterCount; ++$i) {
            $otherCharacter = new Character($this->createId(), $this->faker->firstName, $adventure->getRandomLocation());
            $adventure->addOtherCharacter($otherCharacter);
        }

        for ($i = 0; $i < $this->itemCount; ++$i) {
            $item = new Item($this->createId(), $this->faker->word);
            $adventure->addItem($item);
        }

        return $adventure;
    }

    private function buildLocations(RandomAdventure $adventure): void
    {
        for ($i = 0; $i < $this->locationCount; ++$i) {
            $location = new Location($this->createId(), $this->faker->streetName);
            $adventure->addLocation($location);
        }

        $locations = $adventure->getLocations();
        foreach ($locations as $location) {
            $location->connectTo($adventure->getRandomLocation($location));
        }
    }

    private function createId(): string
    {
        return Uuid::uuid4()->toString();
    }
}
