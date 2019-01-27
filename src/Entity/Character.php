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

class Character
{
    use IdTrait;
    use NameTrait;

    private $location;

    public function __construct(string $id, string $name, Location $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}
