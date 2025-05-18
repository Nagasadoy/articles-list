<?php

declare(strict_types=1);

namespace App\Application\Service\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Repository\Article\ArticleRepositoryInterface;

readonly class ArticleService implements ArticleServiceInterface
{
    public function __construct(private ArticleRepositoryInterface $articleRepository)
    {}

    public function getAllArticles(): array
    {
        return $this->articleRepository->getAll();
    }

    public function findArticleBySlug(string $slug): ?Article
    {
        return $this->articleRepository->findBySlug($slug);
    }
}
