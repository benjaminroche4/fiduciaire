<?php

namespace App\Repository;

use App\Entity\Posts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Posts>
 *
 * @method Posts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Posts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Posts[]    findAll()
 * @method Posts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostsRepository extends ServiceEntityRepository
{
    /**
     * The constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Posts::class);
    }

    /**
     * Find all published posts.
     *
     * @return array<Posts>
     */
    public function findAllPublished(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.status = true')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find the last three posts.
     *
     * @return array<Posts>
     */
    public function findLastThree(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.status = true')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Find the recommended posts for the current post.
     *
     * @param string $currentPost
     * @param int $limit
     * @return array<Posts>
     */
    public function findRecommendedPosts(Posts $currentPost, int $limit = 3): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.id != :currentPost')
            ->andWhere('p.status = true')
            ->orderBy('p.createdAt', 'DESC')
            ->setParameter('currentPost', $currentPost)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
