<?php
declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Generator;

final class StaticNumberGenerator implements NumberGenerator
{
    /**
     * @var int[]
     */
    private array $range;

    /**
     * @param int[] $range
     */
    public function __construct(array $range)
    {
        $this->range = $range;
    }

    /**
     * {@inheritDoc}
     */
    public function range(): array
    {
        return $this->range;
    }
}
