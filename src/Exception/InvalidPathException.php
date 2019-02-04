<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Exception;

class InvalidPathException extends AdventureException
{
    public static function createForPath(string $path): InvalidPathException
    {
        return new self(sprintf('Path "%s" does not exist', $path));
    }
}
