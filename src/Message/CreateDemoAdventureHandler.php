<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

use Endroid\AdventureBundle\Builder\AdventureBuilderInterface;
use Endroid\AdventureBundle\Builder\YamlAdventureBuilder;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateDemoAdventureHandler implements MessageHandlerInterface
{
    private $builder;
    private $manager;

    public function __construct(AdventureBuilderInterface $builder, AdventureManagerInterface $manager)
    {
        $this->builder = $builder;
        $this->manager = $manager;
    }

    public function __invoke(CreateDemoAdventure $message)
    {
        $yamlBuilder = new YamlAdventureBuilder();
        $adventure = $yamlBuilder->build();

        dump($adventure);
        die;

        $this->manager->add($adventure);

        return $adventure;
    }
}
