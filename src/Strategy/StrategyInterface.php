<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Strategy;

use Mano\ChessKnight\Collection\MoveCollection;
use Mano\ChessKnight\Common\Square;

/**
 * Strategy to get from one square to another.
 */
interface StrategyInterface
{
    /**
     * @return MoveCollection|null Null returned when no path found
     */
    public function getCollectionOfMoves(Square $currentSquare, Square $targetSquare): ?MoveCollection;
}
