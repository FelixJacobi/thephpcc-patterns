<?php

declare(strict_types=1);

namespace FJcobi\ThePHPCCPatterns\Tests\Strategy\Generator;

use FJcobi\ThePhpCCPatterns\Strategy\Generator\StaticNumberGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \FJcobi\ThePhpCCPatterns\Strategy\Generator\StaticNumberGenerator
 */
final class StaticNumberGeneratorTest extends TestCase
{
    public function testRange(): void
    {
        $generator = new StaticNumberGenerator([1, 2, 3]);

        $this->assertSame([1, 2, 3], $generator->range(), 'generates correct range');
    }
}
