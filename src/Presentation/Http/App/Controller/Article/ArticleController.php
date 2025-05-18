<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Article;

use App\Application\Service\Article\ArticleServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route(path: '/articles', name: 'article_list', methods: ['GET'])]
    public function getArticleList(ArticleServiceInterface $articleService): Response
    {
        $articles = $articleService->getAllArticles();
        return $this->render('app/page/article/list.html.twig', ['articles' => $articles]);
    }

    #[Route(path: '/articles/{slug}', name: 'article_concrete', methods: ['GET'])]
    public function findArticleBySlug(ArticleServiceInterface $articleService, string $slug): Response
    {
        $article = $articleService->findArticleBySlug($slug);

        if ($article === null) {
            throw new NotFoundHttpException();
        }

        return $this->render('app/page/article/concrete.html.twig', ['article' => $article]);
    }
}
