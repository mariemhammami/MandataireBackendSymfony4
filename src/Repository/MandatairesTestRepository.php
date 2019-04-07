<?php

namespace App\Repository;

use App\Entity\MandatairesTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MandatairesTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method MandatairesTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method MandatairesTest[]    findAll()
 * @method MandatairesTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MandatairesTestRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MandatairesTest::class);
    }

    // /**
    //  * @return MandatairesTest[] Returns an array of MandatairesTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MandatairesTest
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
