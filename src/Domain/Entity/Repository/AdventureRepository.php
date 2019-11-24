<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\AdventureBundle\Domain\Entity\Repository;

use Doctrine\Common\Persistence\ManagerRegistry;
use Endroid\AdventureBundle\Domain\Entity\Adventure;

class AdventureRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adventure::class);
    }
}
