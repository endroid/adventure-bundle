<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Query\Handler;

use Endroid\AdventureBundle\Domain\Query\GetAdventuresQuery;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetAdventuresHandler implements MessageHandlerInterface
{
    private $adventureManager;

    public function __construct(AdventureManagerInterface $adventureManager)
    {
        $this->adventureManager = $adventureManager;
    }

    public function __invoke(GetAdventuresQuery $message)
    {
        return $this->adventureManager->getAll();
    }
}
