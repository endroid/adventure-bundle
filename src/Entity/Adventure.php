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

    public function getName(): string
    {
        return $this->name;
    }

    public function addMainCharacter(Character $character): void
    {
        $this->mainCharacters[$character->getName()] = $character;
    }

    public function getMainCharacters(): array
    {
        return $this->mainCharacters;
    }

    public function addOtherCharacter(Character $character): void
    {
        $this->otherCharacters[$character->getName()] = $character;
    }

    public function getOtherCharacters(): array
    {
        return $this->otherCharacters;
    }

    public function addLocation(Location $location): void
    {
        $this->locations[$location->getName()] = $location;
    }

    public function getLocations(): array
    {
        return $this->locations;
    }

    public function addItem(Item $item): void
    {
        $this->items[$item->getName()] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
