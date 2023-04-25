<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Piece;

use Mano\ChessKnight\Common\Offset;

/**
 * Represent a particular chess piece
 */
interface PieceInterface
{
    public function getName(): string;

    /**
     * @return Offset[]
     */
    public function getPossibleOffsets(): array;
}
