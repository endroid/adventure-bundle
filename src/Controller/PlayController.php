<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Exception\AdventureNotFoundException;
use Endroid\AdventureBundle\Query\GetAdventureQuery;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class PlayController
{
    private $queryBus;
    private $router;
    private $templating;

    public function __construct(MessageBusInterface $queryBus, RouterInterface $router, Environment $templating)
    {
        $this->queryBus = $queryBus;
        $this->router = $router;
        $this->templating = $templating;
    }

    /**
     * @Route("/{adventureId}", name="adventure_play")
     */
    public function __invoke(string $adventureId): Response
    {
        try {
            $getAdventureCommand = new GetAdventureQuery($adventureId);
            $envelope = $this->queryBus->dispatch($getAdventureCommand);
            dump($envelope);
            die;
        } catch (AdventureNotFoundException $exception) {
            return new RedirectResponse($this->router->generate('adventure_create', ['adventureId' => $adventureId]));
        }

        return new Response($this->templating->render('@EndroidAdventure/play.html.twig', [
            'adventure' => $adventure,
        ]));
    }
}
