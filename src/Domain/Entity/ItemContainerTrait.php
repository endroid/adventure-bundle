<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Entity;

trait ItemContainerTrait
{
    private $items = [];

    /**
     * Should only be called from item interface setItemContainer
     * This to ensure that items have only one single container.
     */
    public function addItem(ItemInterface $item): void
    {
        $this->items[$item->getId()] = $item;
    }

    /**
     * Should only be called from item interface setItemContainer
     * This to ensure that items have only one single container.
     */
    public function removeItem(string $id): void
    {
        unset($this->items[$id]);
    }

    public function hasItem(string $id): bool
    {
        return isset($this->items[$id]);
    }

    public function getItem(string $id): ItemInterface
    {
        return $this->items[$id];
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
