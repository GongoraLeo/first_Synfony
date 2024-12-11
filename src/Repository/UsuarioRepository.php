<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Usuario>
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function findByEdad($edad): array
        {
            return $this->createQueryBuilder('u')
                ->andWhere('u.edad = :edad')
                ->setParameter('edad', $edad)
                ->getQuery()
                ->getResult()
            ;
        }

    //otro ejemplo para hacer lo mismo de forma distinta accediendo al entityManager en vez de a la entidad concreta
    public function findByEdadQuery($edad): array
        {
            $em = $this->getEntityManager();
            $query = $em->createQuery(
                'SELECT u
                FROM App\Entity\Usuario u
                WHERE u.edad = :edad'
            )->setParameter('edad', $edad);
            return $query->getResult();

        }

    //    /**
    //     * @return Usuario[] Returns an array of Usuario objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Usuario
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
