<?php

declare(strict_types=1);

namespace Mano\ChessKnight\ResultInterpreter;

use Mano\ChessKnight\Collection\MoveCollection;

interface ResultInterpreterInterface
{
    /**
     * @return mixed
     */
    public function interpret(?MoveCollection $moveCollection);
}
