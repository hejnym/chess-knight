<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

/**
 * Represents a part of a chain that consists of all moves. Complete history can be recreated from the last move.
 */
class Move
{
    private Square $currentSquare;
    private ?Move $previousMove;
    private \DateTimeImmutable $dateTime;

    public function __construct(Square $currentSquare, ?Move $previousMove)
    {
        $this->dateTime = new \DateTimeImmutable();
        $this->previousMove = $previousMove;
        $this->currentSquare = $currentSquare;
    }

    public function getCurrentSquare(): Square
    {
        return $this->currentSquare;
    }

    public function getTimeOfMove(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    /**
     * @return Move|null
     */
    public function getPreviousMove(): ?Move
    {
        return $this->previousMove;
    }
}
