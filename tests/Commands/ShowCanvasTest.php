<?php

namespace GraphicalEditor\Tests\Commands;

final class ShowCanvasTest extends BaseTest
{
    public function testRun(): void
    {
        $this->expectOutputString("=>\n{$this->image}\n");
        $this->dispatcher->dispatch('S')
            ->run();
    }
}
