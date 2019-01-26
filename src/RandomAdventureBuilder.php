<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Entity\Character;
use Faker\Factory;

class RandomAdventureBuilder
{
    private $mainCharacterCount;
    private $otherCharacterCount;
    private $locationCount;
    private $itemCount;

    private $faker;

    public function __construct(Factory $fakerFactory)
    {
        $this->faker = $fakerFactory->create();
    }

    public function setMainCharacterCount(int $mainCharacterCount): void
    {
        $this->mainCharacterCount = $mainCharacterCount;
    }

    public function setOtherCharacterCount(int $otherCharacterCount): void
    {
        $this->otherCharacterCount = $otherCharacterCount;
    }

    public function setLocationCount(int $locationCount): void
    {
        $this->locationCount = $locationCount;
    }

    public function setItemCount(int $itemCount): void
    {
        $this->itemCount = $itemCount;
    }

    public function build(): Adventure
    {
        $adventure = new Adventure($this->faker->domainName);

        dump($adventure);
        die;

        $mainCharacters = [];
        for ($i = 0; $i < $this->mainCharacterCount; ++$i) {
            $mainCharacter = new Character($this->faker->name);
            $mainCharacters[] = $mainCharacter;
        }

        $otherCharacters = [];
        for ($i = 0; $i < $this->otherCharacterCount; ++$i) {
            $otherCharacter = new Character($this->faker->name);
            $otherCharacters[] = $otherCharacter;
        }

        return parent::build();
    }
}
