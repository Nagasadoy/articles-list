<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

class ArticleRepository implements ArticleRepositoryInterface
{
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->repository = $em->getRepository(Article::class);
    }
    public function getAll(): array
    {
        return $this->repository->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }

    public function findBySlug(string $slug): ?Article
    {
        return $this->repository->createQueryBuilder('a')
            ->andWhere('a.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
