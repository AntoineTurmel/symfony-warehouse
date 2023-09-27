<?php

namespace App\Repository;

use App\Entity\Reception;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reception>
 *
 * @method Reception|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reception|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reception[]    findAll()
 * @method Reception[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reception::class);
    }

    public function findAllReceptionsForProduct(Product $product): array
    {
        return $this->createQueryBuilder('r')
             ->select('ps.size, w.id, w.city, r.qty, r.available_at')
             ->leftJoin('r.product_size_id','ps')
             ->leftJoin('ps.product_id','p')
             ->leftJoin('r.warehouse_id', 'w')
             ->where('ps.product_id =' . $product->getId())
             ->orderBy('ps.size')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Reception[] Returns an array of Reception objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reception
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
