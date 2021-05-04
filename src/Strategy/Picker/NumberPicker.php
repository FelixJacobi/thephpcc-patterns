<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

interface NumberPicker
{
    /**
     * @param int[] $numbers
     * @return int[]
     */
    public function pick(array $numbers): array;
}
