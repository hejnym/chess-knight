<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Strategy;

use Mano\ChessKnight\Common\Move;
use Mano\ChessKnight\Common\Square;
use Mano\ChessKnight\ShortestPathFinder;

class TreeStrategy implements StrategyInterface
{
    private ShortestPathFinder $shortestPathFinder;

    public function __construct(ShortestPathFinder $shortestPathFinder)
    {
        $this->shortestPathFinder = $shortestPathFinder;
    }

    public function getLastMove(Square $currentSquare, Square $targetSquare): ?Move
    {
        $tree = new Tree($currentSquare);

        while ($currentMove = $tree->moveToNextPossibleUnvisitedSquare()) {
            $currentMove->getCurrentSquare()->visit();

            foreach ($this->shortestPathFinder->getPiece()->getPossibleOffsets() as $offset) {
                $possibleSquare = $this->shortestPathFinder->getBoard()->getSquare(
                    $currentMove->getCurrentSquare()->getRow() + $offset->rows,
                    $currentMove->getCurrentSquare()->getColumn() + $offset->cols,
                );

                if (!$possibleSquare || $possibleSquare->hasBeenVisited()) {
                    continue;
                }

                if ($this->isFinalSquare($possibleSquare, $targetSquare)) {
                    return $currentMove;
                }

                $tree->grow($possibleSquare, $currentMove);
            }
        }

        return null;
    }

    private function isFinalSquare(?Square $possibleSquare, Square $targetSquare): bool
    {
        return $possibleSquare === $targetSquare;
    }
}
