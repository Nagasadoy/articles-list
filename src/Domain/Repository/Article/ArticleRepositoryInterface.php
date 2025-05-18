<?php

declare(strict_types=1);

namespace App\Domain\Repository\Article;

use App\Domain\Entity\Article\Article;

interface ArticleRepositoryInterface
{
    /**
     * Получить список статей
     * @return Article[]
     */
    public function getAll(): array;

    /**
     * Получить статью по slug
     *
     * @param string $slug
     *
     * @return Article|null
     */
    public function findBySlug(string $slug): ?Article;
}
