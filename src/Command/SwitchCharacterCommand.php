<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Command;

class SwitchCharacterCommand
{
    private $adventureId;
    private $characterId;

    public function __construct(string $adventureId, string $characterId)
    {
        $this->adventureId = $adventureId;
        $this->characterId = $characterId;
    }

    public function getAdventureId()
    {
        return $this->adventureId;
    }

    public function getCharacterId()
    {
        return $this->characterId;
    }
}
