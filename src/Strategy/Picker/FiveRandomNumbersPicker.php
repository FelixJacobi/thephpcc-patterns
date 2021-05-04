<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

final class FiveRandomNumbersPicker implements NumberPicker
{
    /**
     * {@inheritDoc}
     */
    public function pick(array $numbers): array
    {
        $numbers = \array_values($numbers);
        $numberCount = \count($numbers);

        $picked = [];

        while (\count($picked) < 5 && \count($picked) < $numberCount) {
            $key = \random_int(0, $numberCount - 1);
            $pickedNumber = $numbers[$key];

            if (!\in_array($pickedNumber, $picked, true)) {
                $picked[] = $pickedNumber;
            }
        }

        return $picked;
    }
}
