<?php

declare(strict_types=1);

namespace Mano\ChessKnight\ResultInterpreter;

use Mano\ChessKnight\Common\Move;

interface ResultInterpreterInterface
{
    /**
     * @return mixed
     */
    public function interpret(?Move $lastMove);
}
