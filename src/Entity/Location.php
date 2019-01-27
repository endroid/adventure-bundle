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

class Location
{
    use IdTrait;
    use NameTrait;

    private $connectedLocations;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;

        $this->connectedLocations = [];
    }

    public function connectTo(Location $location): void
    {
        if (isset($this->connectedLocations[$location->getId()])) {
            return;
        }

        $this->connectedLocations[$location->getId()] = $location;
        $location->connectTo($this);
    }
}
