<?php

namespace App\Repository;

use App\Entity\ProfilAdministrateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProfilAdministrateur>
 *
 * @method ProfilAdministrateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProfilAdministrateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProfilAdministrateur[]    findAll()
 * @method ProfilAdministrateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfilAdministrateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProfilAdministrateur::class);
    }

//    /**
//     * @return ProfilAdministrateur[] Returns an array of ProfilAdministrateur objects
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

//    public function findOneBySomeField($value): ?ProfilAdministrateur
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
