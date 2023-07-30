<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Collection;

use Mano\ChessKnight\Common\Move;

/**
 * @extends \SplDoublyLinkedList<Move>
 */
class MoveCollection extends \SplDoublyLinkedList
{
    public function __construct(Move $lastMove)
    {
        $currentMove = $lastMove;

        while ($previousMove = $currentMove->getPreviousMove()) {
            $this->push($currentMove);
            $currentMove = $previousMove;
        }
    }
}
