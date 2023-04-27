<?php

declare(strict_types=1);

namespace Mano\ChessKnight;

use Mano\ChessKnight\Common\Board;
use Mano\ChessKnight\Piece\Knight;
use Mano\ChessKnight\ResultInterpreter\DebugInterpreter;
use Mano\ChessKnight\Strategy\TreeStrategy;
use PHPUnit\Framework\TestCase;
use Psr\Log\InvalidArgumentException;

class IntegrationTest extends TestCase
{
    private ShortestPathFinder $shortestPathFinder;
    private Board $board;

    public function setUp(): void
    {
        $this->board = new Board(8);

        $this->shortestPathFinder = new ShortestPathFinder(
            new Knight(),
            $this->board,
            new DebugInterpreter(),
        );

        $this->shortestPathFinder->setStrategy(new TreeStrategy($this->shortestPathFinder));
    }

    /**
     * @dataProvider provideOneMoveTargetPositions
     */
    public function testOnlyOneMove(string $currentPosition, string $targetPosition): void
    {
        $this->assertEquals(
            [],
            $this->getSquareByStandardNotation($currentPosition, $targetPosition)
        );
    }

    /**
     * @param string[] $visitedSquares
     *
     * @dataProvider provideSeveralMovesTargetPositions
     */
    public function testSeveralMoves(string $currentPosition, string $targetPosition, array $visitedSquares): void
    {
        $this->assertEquals(
            $visitedSquares,
            $this->getSquareByStandardNotation($currentPosition, $targetPosition)
        );
    }

    public function testWillFailWhenInaccessible(): void
    {
        $this->board = new Board(3);

        $this->assertNull($this->getSquareByStandardNotation('A1', 'B2'));
    }

    /**
     * @return array<mixed>
     */
    public static function provideOneMoveTargetPositions(): array
    {
        return [
            ['D4', 'C6'],
            ['D4', 'E6'],
            ['D4', 'F5'],
            ['D4', 'F3'],
            ['D4', 'E2'],
            ['D4', 'C2'],
            ['D4', 'B3'],
            ['D4', 'B3'],
            ['D4', 'B5'],
        ];
    }

    /**
     * @return array<mixed>
     */
    public static function provideSeveralMovesTargetPositions(): array
    {
        return [
            ['D4', 'A5', ['C6']],
            ['D4', 'A3', ['C2']],
            ['D4', 'B2', ['D3', 'F4', 'E6']],
            ['D4', 'B2', ['D3', 'F4', 'E6']],
            ['D4', 'H8', ['G6', 'F8', 'E6']],
            ['H7', 'A7', ['C6', 'E5', 'F7', 'G5']],
            ['A8', 'H1', ['F2', 'E4', 'D6', 'C8', 'B6']],
        ];
    }

    /**
     * @return array<string>|null
     */
    private function getSquareByStandardNotation(string $currentPosition, string $targetPosition): ?array
    {
        $current = $this->board->getSquareByChessNotation($currentPosition);
        $target = $this->board->getSquareByChessNotation($targetPosition);

        if (!$current || !$target) {
            throw new InvalidArgumentException();
        }

        return $this->shortestPathFinder->findShortestPath(
            $current,
            $target
        );
    }
}
