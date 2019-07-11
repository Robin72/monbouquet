<?php

namespace App\Repository;

use App\Entity\Fleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fleur[]    findAll()
 * @method Fleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FleurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fleur::class);
    }

    // /**
    //  * @return Fleur[] Returns an array of Fleur objects
    //  */
    public function search(int $nbFleurs, array $couleurs)
    {
        $qb = $this->createQueryBuilder('f');

        return $qb->join('f.couleurs', 'c')
            ->andWhere($qb->expr()->in('c.id', ':couleurs'))
            ->setParameter('couleurs', $couleurs)
            ->setMaxResults($nbFleurs)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Fleur
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
