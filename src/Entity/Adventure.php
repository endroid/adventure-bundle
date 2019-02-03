<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="adventure")
 */
class Adventure implements AdventureInterface
{
    use IdentifiableTrait;

    /**
     * @ORM\OneToMany(targetEntity="Endroid\AdventureBundle\Entity\Location", mappedBy="adventure")
     */
    private $locations;

    private $items;
    private $controllableCharacters;
    private $otherCharacters;

    private $currentCharacter;

    public function __construct(string $id, string $name)
    {
        $this->setIdentification($id, $name);

        $this->locations = [];
        $this->items = [];
        $this->controllableCharacters = [];
        $this->otherCharacters = [];
    }

    public function addLocation(Location $location): void
    {
        $this->locations[$location->getId()] = $location;
        $location->setAdventure($this);
    }
}
