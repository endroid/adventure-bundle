<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

use Ramsey\Uuid\Uuid;

final class CreateAdventureMessage
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = Uuid::fromString($id)->toString();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
