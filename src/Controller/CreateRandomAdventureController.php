<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Message\CreateRandomAdventure;
use Endroid\AdventureBundle\Uuid\UuidGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

final class CreateRandomAdventureController
{
    private $uuidGenerator;
    private $messageBus;
    private $router;

    public function __construct(
        UuidGeneratorInterface $uuidGenerator,
        MessageBusInterface $messageBus,
        RouterInterface $router
    )
    {
        $this->uuidGenerator = $uuidGenerator;
        $this->messageBus = $messageBus;
        $this->router = $router;
    }

    /**
     * @Route("/create-random", name="adventure_create_random")
     */
    public function __invoke(): Response
    {
        $adventureId = $this->uuidGenerator->generate();

        $createRandomAdventure = new CreateRandomAdventure($adventureId);
        $this->messageBus->dispatch($createRandomAdventure);

        return new RedirectResponse($this->router->generate('adventure_play', [
            'adventureId' => $adventureId,
        ]));
    }
}
