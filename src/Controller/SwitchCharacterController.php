<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Controller;

use Endroid\AdventureBundle\Message\SwitchCharacter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

final class SwitchCharacterController
{
    use HandleTrait;

    private $router;

    public function __construct(MessageBusInterface $messageBus, RouterInterface $router)
    {
        $this->messageBus = $messageBus;
        $this->router = $router;
    }

    /**
     * @Route("/{adventureId}/switch-character/{characterId}", name="adventure_switch_character")
     */
    public function __invoke(string $adventureId, string $characterId): Response
    {
        $switchCharacter = new SwitchCharacter($adventureId, $characterId);
        $this->handle($switchCharacter);

        return new RedirectResponse($this->router->generate('adventure_play', [
            'adventureId' => $adventureId,
        ]));
    }
}
