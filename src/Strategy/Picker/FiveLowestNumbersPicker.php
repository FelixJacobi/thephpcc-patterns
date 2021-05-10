<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

final class FiveLowestNumbersPicker implements NumberPicker
{
    /**
     * {@inheritDoc}
     */
    public function pick(array $numbers): array
    {
        \sort($numbers, \SORT_NUMERIC);

        $picked = [];
        $i = 0;

        while ($i < 5 && isset($numbers[$i])) {
            $picked[] = $numbers[$i];
            $i++;
        }

        return $picked;
    }
}
