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

interface AdventureInterface
{
    public function addLocation(LocationInterface $location): void;

    public function addControllableCharacter(CharacterInterface $character): void;

    public function getControllableCharacter(Uuid $id): CharacterInterface;

    public function addOtherCharacter(CharacterInterface $character): void;
}
