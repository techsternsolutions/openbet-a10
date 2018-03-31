<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class GCMDesktopAnswerRepository extends EntityRepository
{
    public function getPaginator(QueryBuilder $queryBuilder)
    {
        return new Pagerfanta(new DoctrineORMAdapter($queryBuilder));
    }

    public function getAll()
    {
        $qb = $this->createQueryBuilder('g')
            ->orderBy('g.createdAt', 'desc');

        return $this->getPaginator($qb);
    }
}
