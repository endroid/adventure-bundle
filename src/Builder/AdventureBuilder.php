<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Builder;

use Endroid\AdventureBundle\Entity\Adventure;
use Endroid\AdventureBundle\Entity\AdventureInterface;
use Endroid\AdventureBundle\Entity\Location;

class AdventureBuilder implements AdventureBuilderInterface
{
    private $adventureClass;
    private $locations;

    public function __construct(?string $adventureClass = Adventure::class)
    {
        $this->adventureClass = $adventureClass;
        $this->locations = [];
    }

    public function addLocation(Location $location): void
    {
        $this->locations[$location->getId()] = $location;
    }

    function build(): AdventureInterface
    {
        $adventure = new $this->adventureClass;

    }
}
