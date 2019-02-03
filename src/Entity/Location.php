<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="adventure_location")
 */
class Location implements IdentifiableInterface
{
    use IdentifiableTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Endroid\AdventureBundle\Entity\Adventure", inversedBy="locations")
     */
    private $adventure;

    public function __construct(string $id, string $name)
    {
        $this->setIdentification($id, $name);
    }

    public function setAdventure(AdventureInterface $adventure): void
    {
        $this->adventure = $adventure;
    }
}
