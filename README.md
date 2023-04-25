# Knight's Shortest Path on an Infinite Chessboard

A logic game as a programming exercise. Find the shortest path of a chess knight on the chessboard.

There are multiple strategies to this problem - only one is implemented so far. 

## Installation

```bash
php composer install
```

## Tests

Not covered all so far - only integration tested thoroughly.

```bash
php bin/vendor/phpunit tests
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
        $result = $finder->find(
            $board->getSquareByChessNotation('A1'),
            $board->getSquareByChessNotation('B3')
        );

```

## Contributing

Pull requests are welcome.  
