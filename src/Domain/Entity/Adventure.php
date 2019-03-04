<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="Endroid\AdventureBundle\Domain\Entity\Repository\AdventureRepository")
 * @ORM\Table(name="adventure")
 */
class Adventure implements AdventureInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private $id;
    private $name;

    private $locations = [];
    private $controllableCharacters = [];
    private $otherCharacters = [];
    private $currentCharacter;

    public function __construct(Uuid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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

    public function getControllableCharacter(Uuid $id): CharacterInterface
    {
        return $this->controllableCharacters[$id->toString()];
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
