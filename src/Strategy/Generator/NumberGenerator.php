<?php
declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Generator;


interface NumberGenerator
{
    /**
     * @return int[]
     */
    public function range(): array;
}
