<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

use Mano\ChessKnight\Utils\ChessNotationConvertor;

class Square
{
    private int $row;
    private int $column;
    private bool $visited = false;

    public function __construct(int $row, int $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    public function getName(): string
    {
        return sprintf(
            '%s%s',
            ChessNotationConvertor::convertColumnToAlphabeticalRepresentation($this->column),
            $this->row
        );
    }

    public function getRow(): int
    {
        return $this->row;
    }

    public function getColumn(): int
    {
        return $this->column;
    }

    public function isColored(int $row, int $column): bool
    {
        if($row & 1 && $column & 1) {
            return true;
        }

        return false;
    }

    public function __toString(): string
    {
        return sprintf('Square %s (%s)', $this->getName(), $this->isColored($this->row, $this->column) ? 'black' : 'white');
    }

    public function hasBeenVisited(): bool
    {
        return $this->visited;
    }

    public function visit(): void
    {
        $this->visited = true;
    }
}
