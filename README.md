# Graphical Editor Test
Graphical editors allow users to edit images in the same way text editors let us modify text
files.

Images are represented as an M x N array of pixels with each pixel given a colour.

Produce a program that simulates a simple interactive graphical editor.

## Requirements
- PHP version >= 7.1
- Composer

## Directory structure
- `scripts` contains CLI scripts
- `src` contains the source code
- `tests` contains unit tests

## Pre-execution
`composer install` to install all dependencies and generate autoload script.

## Execution
`php -f scripts/console.php` - run the graphical editor in console environment

`composer tests` - run all application tests

`composer coverage` - generate a code coverage report into the `tests/_output/coverage` directory (require Xdebug installed)
