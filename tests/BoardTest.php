<?php

declare(strict_types=1);

namespace Mano\ChessKnight;

use Mano\ChessKnight\Common\Board;
use Mano\ChessKnight\Common\Square;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{
    public function testCreate(): void
    {
        $board = new Board(8);
        $this->assertCount(8, $board->squares);
    }

    public function testShouldGetSquare(): void
    {
        $board = new Board(8);
        $this->assertEquals(new Square(3, 5), $board->getSquare(3, 5));
    }

    public function testGetSquareShouldReturnNullWhenOutsideBoard(): void
    {
        $board = new Board(3);
        $this->assertNull($board->getSquare(4, 1));
    }

    public function testShouldGetSquareByChessNotation(): void
    {
        $board = new Board(3);
        $this->assertEquals($board->getSquare(3, 3), $board->getSquareByChessNotation('C3'));
    }
}
