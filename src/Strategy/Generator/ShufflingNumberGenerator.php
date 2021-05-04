<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Generator;

/**
 * Generates range of numbers and shuffles afterwards.
 */
final class ShufflingNumberGenerator implements NumberGenerator
{
    private int $from;

    private int $to;

    public function __construct(int $from, int $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * {@inheritDoc}
     */
    public function range(): array
    {
        $numbers = \range($this->from, $this->to);
        \shuffle($numbers);

        return $numbers;
    }
}
