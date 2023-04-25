<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Strategy;

use Mano\ChessKnight\Common\Move;
use Mano\ChessKnight\Common\Square;

/**
 * Strategy to get from one square to another.
 */
interface StrategyInterface
{
    /**
     * @see Move Complete history of moves can be redone from the last move.
     * @return Move|null Nothing returned when no path found.
     */
    public function getLastMove(Square $currentSquare, Square $targetSquare): ?Move;
}
