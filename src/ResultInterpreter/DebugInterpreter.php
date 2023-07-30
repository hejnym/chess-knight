<?php

declare(strict_types=1);

namespace Mano\ChessKnight\ResultInterpreter;

use Mano\ChessKnight\Collection\MoveCollection;

class DebugInterpreter implements ResultInterpreterInterface
{
    /**
     * @return string[]|null List of visited squares
     */
    public function interpret(?MoveCollection $moveCollection): ?array
    {
        if (null === $moveCollection) {
            return null;
        }

        $visitedNodes = [];

        foreach ($moveCollection as $move) {
            $visitedNodes[] = $move->getCurrentSquare()->getName();
        }

        return $visitedNodes;
    }
}
