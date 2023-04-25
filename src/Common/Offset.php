<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

class Offset
{
    public int $rows;
    public int $cols;

    public function __construct(int $rows, int $cols)
    {
        $this->rows = $rows;
        $this->cols = $cols;
    }
}
