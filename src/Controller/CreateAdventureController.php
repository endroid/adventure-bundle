<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Message\CreateAdventure;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

final class CreateAdventureController
{
    private $messageBus;
    private $router;

    public function __construct(
        MessageBusInterface $messageBus,
        RouterInterface $router
    ) {
        $this->messageBus = $messageBus;
        $this->router = $router;
    }

    /**
     * @Route("/create/{id}", name="adventure_create")
     */
    public function __invoke(string $id): Response
    {
        $createAdventure = new CreateAdventure($id);
        $this->messageBus->dispatch($createAdventure);

        return new RedirectResponse($this->router->generate('adventure_play', [
            'adventureId' => $id,
        ]));
    }
}
