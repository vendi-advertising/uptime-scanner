<?php

namespace App\Repository;

use App\Entity\DnsEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DnsEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method DnsEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method DnsEntry[]    findAll()
 * @method DnsEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DnsEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DnsEntry::class);
    }

    // /**
    //  * @return DnsEntry[] Returns an array of DnsEntry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DnsEntry
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
