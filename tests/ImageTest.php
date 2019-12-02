<?php

namespace GraphicalEditor\Tests;

use PHPUnit\Framework\TestCase;
use GraphicalEditor\Image;
use GraphicalEditor\Exceptions\InvalidPixelException;
use InvalidArgumentException;

final class ImageTest extends TestCase
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

    /**
     * @var Image
     */
    protected $image;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->image = new Image();
    }

    public function testInvalidColsCreateCanvas(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Exceed the maximum columns number');

        $this->image->createCanvas(300, 6);
    }

    public function testInvalidRowsCreateCanvas(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Exceed the maximum rows number');

        $this->image->createCanvas(5, 300);
    }

    public function testCreateCanvas(): void
    {
        $this->image->createCanvas(5, 6);

        $this->assertSame(static::EMPTY_CANVAS_5X6, $this->image->getCanvas());
    }

    public function testClearCanvas(): void
    {
        $this->image->createCanvas(5, 6);
        $this->image->drawVerticalLine(2, 2, 4, 'X');
        $this->image->clearCanvas();

        $this->assertSame(static::EMPTY_CANVAS_5X6, $this->image->getCanvas());
    }

    public function testInvalidDrawPixel(): void
    {
        $this->image->createCanvas(5, 6);

        $this->expectException(InvalidPixelException::class);
        $this->expectErrorMessage('Invalid pixel at (7;4}) coordinates');

        $this->image->drawPixel(7, 4, 'I');
    }

    public function testIsEmptyPixel(): void
    {
        $this->image->createCanvas(5, 6);

        $this->assertTrue($this->image->isEmptyPixel(3, 3));
    }

    public function testNotEmptyPixel(): void
    {
        $this->image->createCanvas(5, 6);
        $this->image->drawPixel(3, 2, 'I');

        $this->assertFalse($this->image->isEmptyPixel(3, 2));
    }
}
