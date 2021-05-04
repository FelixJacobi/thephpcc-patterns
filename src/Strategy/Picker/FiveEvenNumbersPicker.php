<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

final class FiveEvenNumbersPicker implements NumberPicker
{
    /**
     * {@inheritDoc}
     */
    public function pick(array $numbers): array
    {
        $numbers = \array_values($numbers);
        $evenNumbers = [];

        foreach ($numbers as $number) {
            if ($number % 2 === 0) {
                $evenNumbers[] = $number;
            }
        }

        $numberCount = \count($evenNumbers);

        $picked = [];

        while (\count($picked) < 5 && \count($picked) < $numberCount) {
            $key = \random_int(0, $numberCount - 1);
            $pickedNumber = $evenNumbers[$key];

            if (!\in_array($pickedNumber, $picked, true)) {
                $picked[] = $pickedNumber;
            }
        }

        return $picked;
    }
}
