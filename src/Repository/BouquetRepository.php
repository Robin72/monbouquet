<?php

namespace App\Repository;

use App\Entity\Bouquet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bouquet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bouquet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bouquet[]    findAll()
 * @method Bouquet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouquetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bouquet::class);
    }

    // /**
    //  * @return Bouquet[] Returns an array of Bouquet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bouquet
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
