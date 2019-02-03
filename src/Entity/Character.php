<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

class Character implements CharacterInterface
{
    use IdentifiableTrait;
    use InteractiveTrait;

    private $items;
    private $location;

    public function __construct(string $id, string $name)
    {
        $this->setIdentification($id, $name);
        $this->items = [];
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
