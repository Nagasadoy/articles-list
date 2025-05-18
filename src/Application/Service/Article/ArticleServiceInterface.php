<?php

declare(strict_types=1);

namespace App\Application\Service\Article;

use App\Domain\Entity\Article\Article;

interface ArticleServiceInterface
{
    /**
     * @return Article[]
     */
    public function getAllArticles(): array;

    /**
     * @param string $slug
     *
     * @return Article|null
     */
    public function findArticleBySlug(string $slug): ?Article;
}
