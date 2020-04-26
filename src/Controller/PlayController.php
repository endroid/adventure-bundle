<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Manager\AdventureManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class PlayController
{
    private $manager;
    private $templating;

    public function __construct(AdventureManagerInterface $manager, Environment $templating)
    {
        $this->manager = $manager;
        $this->templating = $templating;
    }

    /**
     * @Route("/{id}/play", name="adventure_play")
     */
    public function __invoke(string $id): Response
    {
        $adventure = $this->manager->get($id);

        if (!$adventure instanceof Adventure) {
            throw new NotFoundHttpException('Adventure not found');
        }

        return new Response($this->templating->render('@EndroidAdventure/play.html.twig', [
            'adventure' => $adventure,
        ]));
    }
}
