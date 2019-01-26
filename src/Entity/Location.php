<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

class Location
{
    private $id;
    private $name;
    private $connectedLocations;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->connectedLocations = [];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function connectTo(Location $location): void
    {
        $this->connectedLocations[$location->getId()] = $location;
    }
}
