<?php

namespace App\Enums\Bb;

use Exception;

enum TypeEnum: int
{
    case BUY = 1;
    case SELL = 2;

    /**
     * @throws Exception
     */
    public function text(): string
    {
        return match ($this) {
            self::BUY => 'type.buy',
            self::SELL => 'type.sell',
            default => throw new Exception('Unexpected match value'),
        };
    }
}
