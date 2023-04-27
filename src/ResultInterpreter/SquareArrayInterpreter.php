<?php

declare(strict_types=1);

namespace Mano\ChessKnight\ResultInterpreter;

use Mano\ChessKnight\Common\Move;
use Mano\ChessKnight\Common\Square;

class SquareArrayInterpreter
{
    /**
     * @return Square[] List of visited squares
     */
    public function interpret(Move $currentMove): array
    {
        $visitedNodes = [];

        $processedMove = $currentMove;
        while ($processedMove) {
            if ($processedMove->getPreviousMove()) {
                $visitedNodes[] = $processedMove->getCurrentSquare();
            }

            $processedMove = $processedMove->getPreviousMove();
        }

        return $visitedNodes;
    }
}
