<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Entity;

use Ramsey\Uuid\Uuid;

class Item implements ItemInterface
{
    use InteractiveTrait;

    private $id;
    private $name;
    private $itemContainer;

    public function __construct(Uuid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function setItemContainer(ItemContainerInterface $itemContainer): void
    {
        if ($this->itemContainer instanceof ItemContainerInterface) {
            $this->itemContainer->removeItem($this->getId());
        }

        $this->itemContainer = $itemContainer;
        $this->itemContainer->addItem($this);
    }
}
