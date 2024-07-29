<?php

namespace App\Repository;

use App\Entity\PostCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostCategories>
 *
 * @method PostCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostCategories[]    findAll()
 * @method PostCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostCategories::class);
    }
}
