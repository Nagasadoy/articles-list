<?php

declare(strict_types=1);

namespace App\Application\Service\Formatter;

interface ViewCountFormatterInterface
{
    public function format(int $numberValue): string;
}
