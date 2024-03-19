<?php

namespace App\Repository;

use App\Entity\ProfilRecruteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilRecruteur>
 *
 * @method ProfilRecruteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilRecruteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilRecruteur[]    findAll()
 * @method ProfilRecruteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilRecruteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilRecruteur::class);
    }

//    /**
//     * @return ProfilRecruteur[] Returns an array of ProfilRecruteur objects
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

//    public function findOneBySomeField($value): ?ProfilRecruteur
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
