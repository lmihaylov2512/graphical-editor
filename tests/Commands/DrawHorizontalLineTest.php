<?php

namespace GraphicalEditor\Tests\Commands;

use InvalidArgumentException;

final class DrawHorizontalLineTest extends BaseTest
{
    public function testInvalidRun(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dispatcher->dispatch('H 2 4 B')
            ->run();
    }

    public function testRun(): void
    {
        $this->dispatcher->dispatch('H 2 4 5 B')
            ->run();

        $canvas = static::EMPTY_CANVAS_5X6;
        $canvas[5][2] = 'B';
        $canvas[5][3] = 'B';
        $canvas[5][4] = 'B';
        $this->assertSame($canvas, $this->image->getCanvas());
    }
}
