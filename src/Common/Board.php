<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

use Mano\ChessKnight\Utils\ChessNotationConvertor;

class Board
{
    /** @var Square[][] */
    public array $squares;
    private int $squaresInRow;

    public function __construct(int $squaresInRow = 8)
    {
        $this->squaresInRow = $squaresInRow;
        $this->fillBoardWithSquares($squaresInRow);
    }

    public function getSquare(int $row, int $col): ?Square
    {
        if ($row <= 0 || $row > $this->squaresInRow || $col <= 0 || $col > $this->squaresInRow) {
            return null;
        }

        return $this->squares[$row][$col];
    }

    public function getSquareByChessNotation(string $position): ?Square
    {
        $position = ChessNotationConvertor::getSquarePositionFromChessNotation($position);

        return $this->getSquare(
            $position['row'],
            $position['col']
        );
    }

    private function fillBoardWithSquares(int $n): void
    {
        for ($row = 1; $row <= $n; ++$row) {
            $this->squares[$row] = [];
            for ($column = 1; $column <= $n; ++$column) {
                $this->squares[$row][$column] = new Square($row, $column);
            }
        }
    }
}
