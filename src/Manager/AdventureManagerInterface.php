<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Manager;

use Endroid\AdventureBundle\Entity\AdventureInterface;

interface AdventureManagerInterface
{
    public function add(AdventureInterface $adventure): void;

    public function get(string $id): AdventureInterface;

    public function getAll(): iterable;
}
