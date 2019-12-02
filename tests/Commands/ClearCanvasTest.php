<?php

namespace GraphicalEditor\Tests\Commands;

final class ClearCanvasTest extends BaseTest
{
    public function testRun(): void
    {
        $this->dispatcher->dispatch('V 2 2 4 X')
            ->run();
        $this->dispatcher->dispatch('C')
            ->run();

        $this->assertSame(static::EMPTY_CANVAS_5X6, $this->image->getCanvas());
    }
}
