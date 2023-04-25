<?php

declare(strict_types=1);

namespace Mano\ChessKnight;

use Mano\ChessKnight\Common\Square;
use PHPUnit\Framework\TestCase;

class SquareTest extends TestCase
{
    public function testShouldReturn(): void
    {
        $square1 = new Square(1, 1);
        $square2 = new Square(2, 5);

        $this->assertSame('Square A1 (black)', $square1->__toString());
        $this->assertSame('Square E2 (white)', $square2->__toString());
    }
}
