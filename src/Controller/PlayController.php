<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\RandomAdventureBuilder;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class PlayController
{
    private $builder;
    private $templating;

    public function __construct(RandomAdventureBuilder $builder, Environment $templating)
    {
        $this->builder = $builder;
        $this->templating = $templating;
    }

    public function __invoke(): Response
    {
        $adventure = $this->builder
            ->setMainCharacterCount(4)
            ->setOtherCharacterCount(20)
            ->setLocationCount(10)
            ->setItemCount(20)
        ;

        dump($adventure);
        die;

        return new Response($this->templating->render('@EndroidAdventure/adventure.html.twig'));
    }
}
