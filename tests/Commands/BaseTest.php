<?php

namespace GraphicalEditor\Tests\Commands;

use PHPUnit\Framework\TestCase;
use GraphicalEditor\{
    Image, Dispatcher
};

abstract class BaseTest extends TestCase
{
    /**
     * @var array empty canvas 5x6 size
     */
    protected const EMPTY_CANVAS_5X6 = [
        1 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
        2 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
        3 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
        4 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
        5 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
        6 => [1 => 'O', 2 => 'O', 3 => 'O', 4 => 'O', 5 => 'O'],
    ];
    protected const FILLED_CANVAS_5x6 = [
        1 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
        2 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
        3 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
        4 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
        5 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
        6 => [1 => '-', 2 => '-', 3 => '-', 4 => '-', 5 => '-'],
    ];

    /**
     * @var Image
     */
    protected $image;
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->image = new Image();
        $this->dispatcher = new Dispatcher($this->image);
        $this->dispatcher->dispatch('I 5 6')
            ->run();
    }
}
