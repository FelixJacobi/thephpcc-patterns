<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Selector;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\NumberPicker;

final class NumberSelector
{
    private NumberPicker $picker;

    public function __construct(NumberPicker $picker)
    {
        $this->picker = $picker;
    }

    /**
     * @param int[] $numbers
     * @return int[]
     */
    public function selectFrom(array $numbers): array
    {
        return $this->picker->pick($numbers);
    }
}
