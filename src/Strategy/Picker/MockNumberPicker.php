<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Picker;

final class MockNumberPicker implements NumberPicker
{
    private \Iterator $expectedPicks;

    /**
     * MockNumberPicker constructor.
     *
     * @param array<array{0: array<int,int>, 1: array<int,int>}> $expectedPicks
     */
    public function __construct(array $expectedPicks)
    {
        $iterator = new \ArrayIterator($expectedPicks);

        $this->expectedPicks = $iterator;
    }

    public function pick(array $numbers): array
    {
        if (!$this->expectedPicks->valid()) {
            throw new \RuntimeException('No more picks expected.');
        }

        /** @var array{0: array<int,int>, 1: array<int,int>} $spec */
        $spec = $this->expectedPicks->current();

        if ($numbers !== $spec[0]) {
            throw new \RuntimeException(\sprintf(
                'Numbers were not expected to be picked: %s (expected: %s)',
                \implode(', ', $numbers),
                \implode(', ', $spec[0])
            ));
        }

        $this->expectedPicks->next();

        return $spec[1];
    }
}
