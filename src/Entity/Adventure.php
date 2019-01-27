<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

use Endroid\AdventureBundle\Traits\IdTrait;
use Endroid\AdventureBundle\Traits\NameTrait;

class Adventure
{
    use IdTrait;
    use NameTrait;

    private $mainCharacters;
    private $otherCharacters;
    private $locations;
    private $items;

    private $currentCharacter;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mainCharacters = [];
        $this->otherCharacters = [];
        $this->locations = [];
        $this->items = [];
    }

    public function addMainCharacter(Character $character): void
    {
        if (!$this->currentCharacter instanceof Character) {
            $this->currentCharacter = $character;
        }

        $this->mainCharacters[$character->getId()] = $character;
    }

    public function getMainCharacters(): array
    {
        return $this->mainCharacters;
    }

    public function getMainCharacterById(string $characterId): Character
    {
        return $this->mainCharacters[$characterId];
    }

    public function setCurrentCharacter(Character $character): void
    {
        $this->currentCharacter = $character;
    }

    public function getCurrentCharacter(): Character
    {
        return $this->currentCharacter;
    }

    public function addOtherCharacter(Character $character): void
    {
        $this->otherCharacters[$character->getId()] = $character;
    }

    public function getOtherCharacters(): array
    {
        return $this->otherCharacters;
    }

    public function addLocation(Location $location): void
    {
        $this->locations[$location->getId()] = $location;
    }

    /**
     * @return Location[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }

    public function addItem(Item $item): void
    {
        $this->items[$item->getId()] = $item;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
