<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Tests\Strategy\Picker;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\MockNumberPicker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Picker\MockNumberPicker
 */
final class MockNumberPickerTest extends TestCase
{
    public function testPickWithNoSpec(): void
    {
        $picker = new MockNumberPicker([]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('No more picks expected.');

        $picker->pick([1, 2, 3]);
    }

    public function testPickWithSpec(): void
    {
        $picker = new MockNumberPicker([
            [[1, 2, 3], [1, 2]],
            [[4, 5, 6], [4, 6]],
        ]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('No more picks expected.');

        $this->assertSame([1, 2], $picker->pick([1, 2, 3]), 'first pick matches spec');
        $this->assertSame([4, 6], $picker->pick([4, 5, 6]), 'second pick matches spec');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('No more picks expected.');

        $picker->pick([1, 2, 3]);
    }

    public function testPickWithSpecViolation(): void
    {
        $picker = new MockNumberPicker([
            [[1, 2, 3], [1, 2]],
        ]);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Numbers were not expected to be picked: 4, 5, 6 (expected: 1, 2, 3)');

        $picker->pick([4, 5, 6]);
    }
}
