<?php

namespace GraphicalEditor\Commands;

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
        exit;
    }
}
