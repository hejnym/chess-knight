<?php

declare(strict_types=1);

namespace Mano\ChessKnight\ResultInterpreter;

use Mano\ChessKnight\Common\Move;

class DebugInterpreter implements ResultInterpreterInterface
{
    /**
     * @return string[]|null List of visited squares
     */
    public function interpret(?Move $lastMove): ?array
    {
        if(!$lastMove) {
            return null;
        }

        $visitedNodes = [];

        $processedMove = $lastMove;
        while ($processedMove) {
            if($processedMove->getPreviousMove()) {
                $visitedNodes[] = $processedMove->getCurrentSquare()->getName();
            }

            $processedMove  = $processedMove->getPreviousMove();
        }
        return $visitedNodes;
    }
}
