<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Strategy;

use Mano\ChessKnight\Common\Move;
use Mano\ChessKnight\Common\Square;

/**
 * Represents a tree that is being built during the search. A queue is used in order to search at the same depth first
 * before moving to next level.
 */
class Tree
{
    private \SplQueue $queue;

    public function __construct(Square $square)
    {
        $this->queue = new \SplQueue();
        $this->queue->enqueue(new Move($square, null));
    }

    public function moveToNextPossibleUnvisitedSquare(): ?Move
    {
        if(!$this->canGrow()) {
            return null;
        }

        /** @var Move $move */
        $move = $this->queue->dequeue();

        // @phpstan-ignore-next-line Method canGrow is called upon recreated queue
        while($move->getCurrentSquare()->hasBeenVisited() && $this->canGrow()) {
            $move = $this->queue->dequeue();
        }

        return $move;
    }

    public function grow(Square $possibleSquare, Move $previousMove): void
    {
        $this->queue->enqueue(new Move($possibleSquare, $previousMove));
    }

    private function canGrow(): bool
    {
        return false === $this->queue->isEmpty();
    }
}
