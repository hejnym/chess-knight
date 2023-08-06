<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Strategy;

use Mano\ChessKnight\Collection\MoveCollection;
use Mano\ChessKnight\Common\Square;
use Mano\ChessKnight\ShortestPathFinder;

final readonly class BreadthFirstStrategy implements StrategyInterface
{
    public function __construct(
        private ShortestPathFinder $shortestPathFinder
    ) {
    }

    public function getCollectionOfMoves(Square $currentSquare, Square $targetSquare): ?MoveCollection
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
                    return new MoveCollection($currentMove);
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
