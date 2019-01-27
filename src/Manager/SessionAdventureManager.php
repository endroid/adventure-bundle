<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Manager;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Entity\Character;
use Endroid\AdventureBundle\Entity\Item;
use Endroid\AdventureBundle\Entity\Location;
use Faker\Factory;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionAdventureManager implements AdventureManagerInterface
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function add(Adventure $adventure): void
    {
        $this->session->set($adventure->getId(), $adventure);
    }

    public function get(string $id): Adventure
    {
        if (!$this->session->has($id)) {
            throw AdventureNotFoundException::createForId($id);
        }

        $adventure = $this->session->get($id);

        if (!$adventure instanceof Adventure) {
            throw AdventureNotFoundException::createForId($id);
        }

        return $adventure;
    }
}
