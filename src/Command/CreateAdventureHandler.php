<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Command;

use Endroid\AdventureBundle\Builder\AdventureBuilderInterface;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateAdventureHandler implements MessageHandlerInterface
{
    private $builder;
    private $manager;

    public function __construct(AdventureBuilderInterface $builder, AdventureManagerInterface $manager)
    {
        $this->builder = $builder;
        $this->manager = $manager;
    }

    public function __invoke(CreateAdventureCommand $message)
    {
        $adventure = $this->builder->build($message->getId());

        $this->manager->add($adventure);

        return $adventure;
    }
}
