<?php

declare(strict_types=1);

namespace Mano\ChessKnight;

use Mano\ChessKnight\Common\Board;
use Mano\ChessKnight\Common\Square;
use Mano\ChessKnight\Piece\PieceInterface;
use Mano\ChessKnight\ResultInterpreter\ResultInterpreterInterface;
use Mano\ChessKnight\Strategy\StrategyInterface;

class ShortestPathFinder
{
    private PieceInterface $piece;
    private Board $board;
    private ResultInterpreterInterface $interpreter;
    private ?StrategyInterface $strategy;

    public function __construct(
        PieceInterface $piece,
        Board $board,
        ResultInterpreterInterface $interpreter,
        ?StrategyInterface $strategy = null
    ) {
        $this->piece = $piece;
        $this->board = $board;
        $this->interpreter = $interpreter;
        $this->strategy = $strategy;
    }

    public function findShortestPath(Square $currentSquare, Square $targetSquare): mixed
    {
        // TODO: check if squares exist in the board

        if (!$this->strategy) {
            throw new \RuntimeException();
        }

        return $this->interpreter->interpret(
            $this->strategy->getCollectionOfMoves($currentSquare, $targetSquare)
        );
    }

    public function getPiece(): PieceInterface
    {
        return $this->piece;
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function setStrategy(?StrategyInterface $strategy): void
    {
        $this->strategy = $strategy;
    }
}
