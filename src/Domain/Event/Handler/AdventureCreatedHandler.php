<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Event\Handler;

use Endroid\AdventureBundle\Domain\Event\AdventureCreatedEvent;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class AdventureCreatedHandler implements MessageHandlerInterface
{
    public function __invoke(AdventureCreatedEvent $event)
    {
        dump($event);
        die;
    }
}
