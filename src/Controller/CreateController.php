<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Domain\Command\CreateAdventureCommand;
use Endroid\AdventureBundle\Domain\Entity\Repository\AdventureRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class CreateController
{
    private $commandBus;
    private $adventureRepository;
    private $router;
    private $templating;

    public function __construct(
        MessageBusInterface $commandBus,
        AdventureRepository $adventureRepository,
        RouterInterface $router,
        Environment $templating
    ){
        $this->commandBus = $commandBus;
        $this->adventureRepository = $adventureRepository;
        $this->router = $router;
        $this->templating = $templating;
    }

    /**
     * @Route("/create/{type}", name="adventure_create")
     */
    public function __invoke(string $type): Response
    {
        $createAdventureCommand = new CreateAdventureCommand($this->adventureRepository->nextIdentity(), $type);
        $this->commandBus->dispatch($createAdventureCommand);

        return new RedirectResponse($this->router->generate('adventure_play', [
            'adventureId' => $adventureId,
        ]));
    }
}
