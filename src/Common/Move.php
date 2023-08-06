<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

/**
 * Represents a part of a chain that consists of all moves. Complete history can be recreated from the last move.
 */
readonly class Move
{
    private \DateTimeImmutable $dateTime;

    public function __construct(
        private Square $currentSquare,
        private ?Move $previousMove
    ) {
        $this->dateTime = new \DateTimeImmutable();
    }

    public function getCurrentSquare(): Square
    {
        return $this->currentSquare;
    }

    public function getTimeOfMove(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function getPreviousMove(): ?Move
    {
        return $this->previousMove;
    }
}
