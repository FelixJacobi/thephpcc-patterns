<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Strategy\Tests\Selector;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\MockNumberPicker;
use FJcobi\ThePhpCCPatterns\Strategy\Selector\NumberSelector;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Selector\NumberSelector
 * @uses \FJcobi\ThePHPCCPatterns\Strategy\Picker\MockNumberPicker
 */
final class NumberSelectorTest extends TestCase
{
    public function testSelectFrom(): void
    {
        $selector = new NumberSelector(new MockNumberPicker([
            [[1, 2, 3], [1, 2]],
        ]));

        $this->assertSame([1, 2], $selector->selectFrom([1, 2, 3]), 'uses picker result');
    }
}
