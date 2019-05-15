<?php

namespace App\Repository;

use App\Entity\Torcedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Torcedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Torcedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Torcedor[]    findAll()
 * @method Torcedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TorcedorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Torcedor::class);
    }

    // /**
    //  * @return Torcedor[] Returns an array of Torcedor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Torcedor
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
