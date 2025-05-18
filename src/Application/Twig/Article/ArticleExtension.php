<?php

declare(strict_types=1);

namespace App\Application\Twig\Article;

use App\Application\Service\Formatter\ViewCountFormatterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ArticleExtension extends AbstractExtension
{
    public function __construct(private readonly ViewCountFormatterInterface $viewCountFormatter)
    {}

    public function getFunctions(): array
    {
        return [
          new TwigFunction('views_count_format', [$this, 'viewsCountFormat']),
          new TwigFunction('is_enabled_format', [$this, 'isEnabledFormat']),
        ];
    }

    function viewsCountFormat(int $numberValue): string
    {
        return $this->viewCountFormatter->format($numberValue);
    }

    function isEnabledFormat(bool $value): string
    {
        return $value ? '✅' : '❌';
    }
}
