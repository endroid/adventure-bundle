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
    private $id;
    private $name;
    private $locations;
    private $characters;

    public function __construct(string $id, string $name, array $characters, array $locations)
    {
        $this->id = $id;
        $this->name = $name;
        $this->characters = $characters;
        $this->locations = $locations;
    }
}
