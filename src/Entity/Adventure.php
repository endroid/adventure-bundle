<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

class Adventure implements AdventureInterface
{
    use IdentifiableTrait;

    private $locations = [];
    private $controllableCharacters = [];
    private $otherCharacters = [];
    private $currentCharacter;

    public function __construct(string $id, string $name)
    {
        $this->setIdentification($id, $name);
    }

    public function addLocation(LocationInterface $location): void
    {
        $this->locations[$location->getId()] = $location;
    }

    public function addControllableCharacter(CharacterInterface $character): void
    {
        if (0 === count($this->controllableCharacters)) {
            $this->currentCharacter = $character;
        }

        $this->controllableCharacters[$character->getId()] = $character;
    }

    public function getControllableCharacter(string $id): CharacterInterface
    {
        return $this->controllableCharacters[$id];
    }

    public function getControllableCharacters(): array
    {
        return $this->controllableCharacters;
    }

    public function addOtherCharacter(CharacterInterface $character): void
    {
        $this->otherCharacters[$character->getId()] = $character;
    }

    public function setCurrentCharacter(CharacterInterface $character): void
    {
        $this->currentCharacter = $character;
    }

    public function getCurrentCharacter(): CharacterInterface
    {
        return $this->currentCharacter;
    }
}
