<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Tests\Strategy\Picker;

use FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveRandomNumbersPicker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Picker\FiveRandomNumbersPicker
 */
final class FiveRandomNumbersPickerTest extends TestCase
{
    public function testPick(): void
    {
        $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $picker = new FiveRandomNumbersPicker();

        $picked = $picker->pick($numbers);

        $this->assertCount(5, $picked, 'five numbers were picked');

        foreach ($picked as $pickedNumber) {
            $this->assertContains($pickedNumber, $numbers, 'random number is contained in original numbers');
        }
    }

    public function testPickWithLessThanFive(): void
    {
        $numbers = [1, 2, 3, 4];
        $picker = new FiveRandomNumbersPicker();

        $picked = $picker->pick($numbers);

        $this->assertCount(4, $picked, 'four numbers were picked');

        foreach ($picked as $pickedNumber) {
            $this->assertContains($pickedNumber, $numbers, 'random number is contained in original numbers');
        }
    }
}
