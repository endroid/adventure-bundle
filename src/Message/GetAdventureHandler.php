<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetAdventureHandler implements MessageHandlerInterface
{
    private $adventureManager;

    public function __construct(AdventureManagerInterface $adventureManager)
    {
        $this->adventureManager = $adventureManager;
    }

    public function __invoke(GetAdventure $message)
    {
        return $this->adventureManager->get($message->getAdventureId());
    }
}
