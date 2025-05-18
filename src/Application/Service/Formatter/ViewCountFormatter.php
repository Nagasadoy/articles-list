<?php

declare(strict_types=1);

namespace App\Application\Service\Formatter;

class ViewCountFormatter implements ViewCountFormatterInterface
{
    private const THOUSAND = 1000;
    private const MILLION = 1_000_000;
    public function format(int $numberValue): string
    {
        if ($numberValue > self::MILLION) {
            return round($numberValue / self::MILLION, 1) . 'M';
        }

        if ($numberValue > self::THOUSAND) {
            return round($numberValue / self::THOUSAND, 1) . 'K';
        }

        return (string)$numberValue;
    }
}
