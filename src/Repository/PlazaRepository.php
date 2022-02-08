<?php

namespace App\Repository;

use App\Entity\Plaza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plaza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plaza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plaza[]    findAll()
 * @method Plaza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlazaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plaza::class);
    }

    // /**
    //  * @return Plaza[] Returns an array of Plaza objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Plaza
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
