<?php

declare(strict_types=1);

namespace Endroid\AdventureBundle\Domain\Entity\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class AbstractRepository extends ServiceEntityRepository
{
    public function save($entity, $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function nextIdentity(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
