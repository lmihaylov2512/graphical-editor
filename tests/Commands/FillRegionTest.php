<?php

namespace GraphicalEditor\Tests\Commands;

use InvalidArgumentException;

final class FillRegionTest extends BaseTest
{
    public function testInvalidRun(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dispatcher->dispatch('F 1 1')
            ->run();
    }

    public function testRun(): void
    {
        $this->dispatcher->dispatch('F 3 3 -')
            ->run();

        $this->assertSame(static::FILLED_CANVAS_5x6, $this->image->getCanvas());
    }
}
