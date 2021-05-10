<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Tests\Strategy\Picker;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveLowestNumbersPicker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveLowestNumbersPicker
 */
final class FiveLowestNumbersPickerTest extends TestCase
{
    public function testPick(): void
    {
        $picker = new FiveLowestNumbersPicker();

        $this->assertSame([1, 2, 3, 4, 5], $picker->pick([1, 10, 2, 9, 3, 8, 4, 7, 5, 6]), 'picks five lowest numbers');
    }

    public function testPickWithLessThanFive(): void
    {
        $picker = new FiveLowestNumbersPicker();

        $this->assertSame([1, 2, 3, 4], $picker->pick([4, 1, 3, 2]), 'picks all numbers');
    }
}
