<?php

namespace GraphicalEditor\Tests\Commands;

use InvalidArgumentException;

final class DrawVerticalLineTest extends BaseTest
{
    public function testInvalidRun(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->dispatcher->dispatch('V 2 2 X')
            ->run();
    }
}
