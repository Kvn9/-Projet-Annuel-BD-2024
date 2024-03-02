<?php

namespace App\Repository;

use App\Entity\SpacePurchase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpacePurchase>
 *
 * @method SpacePurchase|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpacePurchase|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpacePurchase[]    findAll()
 * @method SpacePurchase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpacePurchaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpacePurchase::class);
    }

    //    /**
    //     * @return SpacePurchase[] Returns an array of SpacePurchase objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SpacePurchase
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
