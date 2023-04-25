<?php

declare(strict_types=1);

namespace Mano\ChessKnight\Utils;

use InvalidArgumentException;

class ChessNotationConvertor
{
    private const ASCII_ALPHABET_START = 64;

    public static function convertColumnToIntRepresentation(string $column): int
    {
        if(mb_strlen($column) !== 1 || !ctype_upper($column)) {
            throw new \InvalidArgumentException('Only single uppercase letter can be used as an argument');
        }

        return  ord($column) - self::ASCII_ALPHABET_START;
    }

    public static function convertColumnToAlphabeticalRepresentation(int $column): string
    {
        return chr(self::ASCII_ALPHABET_START + $column);
    }

    /**
     * @return array<string, int>
     */
    public static function getSquarePositionFromChessNotation(string $position): array
    {
        preg_match('/(?<alphabet>[A-Z])(?<number>\d)/', $position, $matches);

        if(empty($matches)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid chess notation', $position));
        }

        return [
            'row' => (int)$matches['number'],
            'col' => self::convertColumnToIntRepresentation($matches['alphabet'])
        ];

    }
}
