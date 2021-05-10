<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Tests\Strategy\Picker;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveEvenNumbersPicker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveEvenNumbersPicker
 */
final class FiveEvenNumbersPickerTest extends TestCase
{
    public function testPick(): void
    {
        $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $picker = new FiveEvenNumbersPicker();

        $picked = $picker->pick($numbers);

        $this->assertCount(5, $picked, 'five numbers were picked');

        foreach ($picked as $pickedNumber) {
            $this->assertContains($pickedNumber, $numbers, 'number is contained in original numbers');
            $this->assertSame(0, $pickedNumber % 2, 'number is even');
        }
    }

    public function testPickWithLessThanFive(): void
    {
        $numbers = [1, 2, 3, 4];
        $picker = new FiveEvenNumbersPicker();

        $picked = $picker->pick($numbers);

        $this->assertCount(2, $picked, 'two numbers were picked');

        foreach ($picked as $pickedNumber) {
            $this->assertContains($pickedNumber, $numbers, 'number is contained in original numbers');
            $this->assertSame(0, $pickedNumber % 2, 'number is even');
        }
    }
}
