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
    private $name;
    private $connectedLocations;

    public function __construct($name)
    {
        $this->name = $name;
        $this->connectedLocations = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function connectTo(Location $location): void
    {
        $this->connectedLocations[$location->getName()] = $location;
    }
}
