<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message\Action;

use Endroid\AdventureBundle\Entity\CharacterInterface;
use Endroid\AdventureBundle\Entity\ItemInterface;

class Give
{
    private $item;
    private $character;

    public function __construct(
        ItemInterface $item,
        CharacterInterface $character
    )
    {
        $this->item = $item;
        $this->character = $character;
    }

    public function getItem(): ItemInterface
    {
        return $this->item;
    }

    public function getCharacter(): CharacterInterface
    {
        return $this->character;
    }
}
