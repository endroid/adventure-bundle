<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Message\CreateDemoAdventure;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

final class CreateDemoAdventureController
{
    private $messageBus;
    private $router;

    public function __construct(
        MessageBusInterface $messageBus,
        RouterInterface $router
    )
    {
        $this->messageBus = $messageBus;
        $this->router = $router;
    }

    /**
     * @Route("/create-demo", name="adventure_create_demo")
     */
    public function __invoke(): Response
    {
        $createRandomAdventure = new CreateDemoAdventure();
        $this->messageBus->dispatch($createRandomAdventure);

        return new RedirectResponse($this->router->generate('adventure_play', [
            'adventureId' => 'demo',
        ]));
    }
}
