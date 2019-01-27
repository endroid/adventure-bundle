<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

use Endroid\AdventureBundle\Builder\RandomAdventureBuilder;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateRandomAdventureHandler implements MessageHandlerInterface
{
    private $builder;
    private $adventureManager;

    public function __construct(RandomAdventureBuilder $builder, AdventureManagerInterface $adventureManager)
    {
        $this->builder = $builder;
        $this->adventureManager = $adventureManager;
    }

    public function __invoke(CreateRandomAdventure $message)
    {
        $adventure = $this->builder
            ->setMainCharacterCount(4)
            ->setOtherCharacterCount(20)
            ->setLocationCount(10)
            ->setItemCount(20)
            ->build();

        $this->adventureManager->add($adventure);

        return $adventure;
    }
}
