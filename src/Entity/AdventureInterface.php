<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

interface AdventureInterface extends IdentifiableInterface
{
    public function addLocation(LocationInterface $location): void;

    public function addControllableCharacter(CharacterInterface $character): void;

    public function addOtherCharacter(CharacterInterface $character): void;
}
