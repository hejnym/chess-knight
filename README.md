# Knight's Shortest Path on Chessboard

A logic game as a programming exercise. Find the shortest path of a chess knight on chessboard.

There are multiple strategies to this problem - only one is implemented so far(Breadth-first search). A tree of all possible moves is built
gradually and the result is evaluated at each depth level.

Other suggested strategies to improve performance:
- divide the board into smaller parts first
- only try offsets that aim to the final square initially
- try several depth level at once (can be also slower - can be nicely combined with previous point)

## Installation

Clone the repository. 

If you want to run tests, run Composer. 

```bash
php composer install
```

## Tests

Not covered all so far - only integration tested thoroughly.

```bash
php vendor/bin/phpunit tests
```


## Usage

```php
// create a board o size 8x8
$board = new Board(8);

$finder = new ShortestPathFinder(
    new Knight(), // set a piece that is used
    $board,
    new SquareArrayInterpreter(), // set how you want to get the result as
);

// the strategy to find the path
$finder->setStrategy(new TreeStrategy());

// result will depend on the interpreter, in this case it will return all the visited squares
$result = $finder->findShortestPath(
    $board->getSquareByChessNotation('A1'),
    $board->getSquareByChessNotation('B3')
);

```

## TODO
- Debug interpreter shows time and memory consumption.