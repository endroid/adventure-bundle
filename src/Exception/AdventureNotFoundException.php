<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Exception;

class AdventureNotFoundException extends AdventureException
{
    public static function createForId(string $id): self
    {
        return new self(sprintf('Adventure with id "%s" not found', $id));
    }
}
