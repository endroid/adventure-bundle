<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Entity;

interface ItemContainerInterface
{
    public function addItem(ItemInterface $item): void;

    public function removeItem(string $id): void;

    public function hasItem(string $id): bool;

    public function getItem(string $id): ItemInterface;

    public function getItems(): array;
}
