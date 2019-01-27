<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

class GetAdventure
{
    private $adventureId;

    public function __construct(string $adventureId)
    {
        $this->adventureId = $adventureId;
    }

    public function getAdventureId()
    {
        return $this->adventureId;
    }
}
