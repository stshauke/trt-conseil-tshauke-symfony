<?php

namespace App\Repository;

use App\Entity\ProfilConsultant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilConsultant>
 *
 * @method ProfilConsultant|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilConsultant|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilConsultant[]    findAll()
 * @method ProfilConsultant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilConsultantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilConsultant::class);
    }

//    /**
//     * @return ProfilConsultant[] Returns an array of ProfilConsultant objects
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

//    public function findOneBySomeField($value): ?ProfilConsultant
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
