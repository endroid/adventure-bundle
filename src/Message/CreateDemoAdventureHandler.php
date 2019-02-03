<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Message;

use Endroid\AdventureBundle\Builder\AdventureBuilder;
use Endroid\AdventureBundle\Builder\AdventureBuilderInterface;
use Endroid\AdventureBundle\Entity\Location;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Yaml\Yaml;

class CreateDemoAdventureHandler implements MessageHandlerInterface
{
    private $builder;
    private $manager;

    public function __construct(
        AdventureBuilderInterface $builder,
        AdventureManagerInterface $manager
    )
    {
        $this->builder = $builder;
        $this->manager = $manager;
    }

    public function __invoke(CreateDemoAdventure $message)
    {
        $this->createLocations();

        $adventure = $this->builder->build();
        $this->manager->add($adventure);

        return $adventure;
    }

    private function createLocations(): void
    {
        $locations = Yaml::parse(__DIR__.'/../Resources/demo/locations.yaml');

        dump($locations);
        die;
    }
}
