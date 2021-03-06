<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message\Handler;

use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Endroid\AdventureBundle\Message\SwitchCharacterMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SwitchCharacterHandler implements MessageHandlerInterface
{
    private $adventureManager;

    public function __construct(AdventureManagerInterface $adventureManager)
    {
        $this->adventureManager = $adventureManager;
    }

    public function __invoke(SwitchCharacterMessage $message)
    {
        $adventure = $this->adventureManager->get($message->getAdventureId());

        $character = $adventure->getControllableCharacter($message->getCharacterId());
        $adventure->setCurrentCharacter($character);
    }
}
