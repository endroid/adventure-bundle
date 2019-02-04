<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

class Location implements LocationInterface
{
    use IdentifiableTrait;
    use ItemContainerTrait;

    public function __construct(string $id, string $name)
    {
        $this->setIdentification($id, $name);
    }
}
