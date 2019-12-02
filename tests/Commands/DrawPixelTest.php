<?php

namespace GraphicalEditor\Tests\Commands;

use InvalidArgumentException;

final class DrawPixelTest extends BaseTest
{
    public function testInvalidRun(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dispatcher->dispatch('L 3 2')
            ->run();
    }

    public function testRun(): void
    {
        $this->dispatcher->dispatch('L 3 2 I')
            ->run();

        $canvas = static::EMPTY_CANVAS_5X6;
        $canvas[2][3] = 'I';
        $this->assertSame($canvas, $this->image->getCanvas());
    }
}
