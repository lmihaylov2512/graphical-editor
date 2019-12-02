<?php

namespace GraphicalEditor\Tests;

use PHPUnit\Framework\TestCase;
use GraphicalEditor\{
    Image, Dispatcher
};
use GraphicalEditor\Exceptions\InvalidCommandException;
use GraphicalEditor\Commands\{
    BaseCommand, CreateCanvas
};

final class DispatcherTest extends TestCase
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $image = new Image();
        $this->dispatcher = new Dispatcher($image);
    }

    public function testInvalidDispatch(): void
    {
        $this->expectException(InvalidCommandException::class);
        $this->dispatcher->dispatch('W 3 3 I');
    }

    public function testBaseDispatch(): void
    {
        $this->assertInstanceOf(BaseCommand::class, $this->dispatcher->dispatch('I 5 6'));
    }

    public function testCreateCommandDispatch(): void
    {
        $cmd = $this->dispatcher->dispatch('I 5 6');

        $this->assertInstanceOf(CreateCanvas::class, $cmd);
        $this->assertCount(2, $cmd->getArgs());
    }
}
