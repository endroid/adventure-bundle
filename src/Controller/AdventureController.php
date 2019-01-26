<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Builder;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class AdventureController
{
    private $builder;
    private $templating;

    public function __construct(Builder $builder, Environment $templating)
    {
        $this->builder = $builder;
        $this->templating = $templating;
    }

    public function __invoke(): Response
    {
        $adventure = $this->builder->createRandom();

        return new Response($this->templating->render('@EndroidAdventure/adventure.html.twig'));
    }
}
