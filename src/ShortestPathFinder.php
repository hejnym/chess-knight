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
    public function __construct(
        private readonly PieceInterface $piece,
        private readonly Board $board,
        private readonly ResultInterpreterInterface $interpreter,
        private ?StrategyInterface $strategy = null
    ) {
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
