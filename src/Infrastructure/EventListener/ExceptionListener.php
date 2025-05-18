<?php

declare(strict_types=1);

namespace App\Infrastructure\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Twig\Environment;

#[AsEventListener]
class ExceptionListener
{
    public function __construct(readonly private Environment $twig)
    {
    }

    public function __invoke(ExceptionEvent $event)
    {
        if ($event->getThrowable() instanceof NotFoundHttpException) {
            $result = $this->twig->render('/app/page/notfound/not_found.html.twig');
            $event->setResponse(new Response($result, Response::HTTP_NOT_FOUND));
        }
    }
}
