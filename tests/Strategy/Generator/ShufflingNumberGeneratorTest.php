<?php

declare(strict_types=1);

namespace FJcobi\ThePhpCCPatterns\Tests\Strategy\Generator;

use FJcobi\ThePhpCCPatterns\Strategy\Generator\ShufflingNumberGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Generator\ShufflingNumberGenerator
 */
final class ShufflingNumberGeneratorTest extends TestCase
{
    public function testRange(): void
    {
        $lowest =  1;
        $highest = 100;

        $generator = new ShufflingNumberGenerator($lowest, $highest);
        $range = $generator->range();

        foreach (\range($lowest, $highest) as $number) {
            $this->assertContains($number, $range, "generated range contains $number");
        }

        $this->assertNotSame(\range($lowest, $highest), $range, 'range is shuffled');
    }
}
