<?php

namespace GraphicalEditor\Tests\Commands;

use InvalidArgumentException;

final class CreateCanvasTest extends BaseTest
{
    public function testInvalidRun(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dispatcher->dispatch('I 5')
            ->run();
    }

    public function testRun(): void
    {
        $this->dispatcher->dispatch('I 5 6')
            ->run();

        $this->assertSame(static::EMPTY_CANVAS_5X6, $this->image->getCanvas());
    }
}
