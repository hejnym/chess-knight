<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Piece;

use Mano\ChessKnight\Common\Offset;

class Knight implements PieceInterface
{
    /**
     * @return Offset[]
     */
    public function getPossibleOffsets(): array
    {
        return [
            new Offset(+2, +1),
            new Offset(+2, -1),
            new Offset(-2, +1),
            new Offset(-2, -1),
            new Offset(+1, +2),
            new Offset(+1, -2),
            new Offset(-1, +2),
            new Offset(-1, -2),
        ];
    }

    public function getName(): string
    {
        return 'knight';
    }
}
