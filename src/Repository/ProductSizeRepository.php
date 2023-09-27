<?php

namespace App\Repository;

use App\Entity\ProductSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductSize>
 *
 * @method ProductSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSize[]    findAll()
 * @method ProductSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductSize::class);
    }

    public function findAllStockAllWarehouses(bool $available): array
    {
        if($available) {
            $where = "r.available_at IS NULL";
        } else {
            $where = "r.available_at IS NOT NULL OR r.id IS NULL";
        }
        return $this->createQueryBuilder('ps')
             ->select('p.id product_id, p.name, p.description, p.reference, ps.size, COALESCE(SUM(r.qty), 0) qty')
             ->groupBy('ps.size')
             ->addGroupBy('p.id')
             ->leftJoin('ps.product_id', 'p')
             ->leftJoin('ps.receptions','r')
             ->leftJoin('r.warehouse_id', 'w')
            ->where($where)
            ->orderBy('p.id, ps.size')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return ProductSize[] Returns an array of ProductSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProductSize
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
