<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

final class FiveHighestNumbersPicker implements NumberPicker
{
    /**
     * {@inheritDoc}
     */
    public function pick(array $numbers): array
    {
        \rsort($numbers, \SORT_NUMERIC);

        $picked = [];
        $i = 0;

        while ($i < 5 && isset($numbers[$i])) {
            $picked[] = $numbers[$i];
            $i++;
        }

        \sort($picked);

        return $picked;
    }
}
