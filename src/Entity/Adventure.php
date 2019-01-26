<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

class Adventure
{
    private $name;
    private $mainCharacters;
    private $otherCharacters;
    private $locations;
    private $items;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->mainCharacters = [];
        $this->otherCharacters = [];
        $this->locations = [];
        $this->items = [];
    }

    public function addMainCharacter(Character $character): void
    {
        $this->characters[$character->getName()] = $character;
    }
}
