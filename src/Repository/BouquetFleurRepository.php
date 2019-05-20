<?php

namespace App\Repository;

use App\Entity\BouquetFleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BouquetFleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method BouquetFleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method BouquetFleur[]    findAll()
 * @method BouquetFleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BouquetFleurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BouquetFleur::class);
    }

    // /**
    //  * @return BouquetFleur[] Returns an array of BouquetFleur objects
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
    public function findOneBySomeField($value): ?BouquetFleur
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
