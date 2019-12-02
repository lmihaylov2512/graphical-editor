<?php

namespace GraphicalEditor\Commands;

use GraphicalEditor\Exceptions\TerminateException;

/**
 * Class Terminate
 * @package GraphicalEditor\Commands
 */
class Terminate extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        throw new TerminateException('Terminate');
    }
}
