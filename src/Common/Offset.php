<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Common;

readonly class Offset
{
    public function __construct(
        public int $rows,
        public int $cols
    ) {
    }
}
