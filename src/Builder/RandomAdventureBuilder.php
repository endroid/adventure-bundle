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
use Faker\Factory;

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
        $adventure = new Adventure($this->faker->city.' '.$this->faker->buildingNumber);

        for ($i = 0; $i < $this->mainCharacterCount; ++$i) {
            $mainCharacter = new Character($this->faker->firstName);
            $adventure->addMainCharacter($mainCharacter);
        }

        for ($i = 0; $i < $this->otherCharacterCount; ++$i) {
            $otherCharacter = new Character($this->faker->firstName);
            $adventure->addOtherCharacter($otherCharacter);
        }

        for ($i = 0; $i < $this->locationCount; $i++) {
            $location = new Location($this->faker->streetName);
            $adventure->addLocation($location);
        }

        for ($i = 0; $i < $this->itemCount; $i++) {
            $item = new Item($this->faker->word);
            $adventure->addItem($item);
        }

        return $adventure;
    }
}
