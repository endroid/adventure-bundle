<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Endroid\AdventureBundle\Message\GetAdventure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

final class PlayController
{
    use HandleTrait;

    private $router;
    private $templating;

    public function __construct(MessageBusInterface $messageBus, RouterInterface $router, Environment $templating)
    {
        $this->messageBus = $messageBus;
        $this->router = $router;
        $this->templating = $templating;
    }

    /**
     * @Route("/{adventureId}/play", name="adventure_play")
     */
    public function __invoke(string $adventureId): Response
    {
        $getAdventure = new GetAdventure($adventureId);
        $adventure = $this->handle($getAdventure);

        return new Response($this->templating->render('@EndroidAdventure/play.html.twig', [
            'adventure' => $adventure,
        ]));
    }
}
