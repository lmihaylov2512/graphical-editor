<?php

namespace GraphicalEditor\Tests\Commands;

use GraphicalEditor\Exceptions\TerminateException;

final class TerminateTest extends BaseTest
{
    public function testRun(): void
    {
        $this->expectException(TerminateException::class);
        $this->expectErrorMessage('Terminate');
        $this->dispatcher->dispatch('X')
            ->run();
    }
}
