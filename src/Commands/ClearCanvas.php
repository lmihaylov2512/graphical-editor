<?php

namespace GraphicalEditor\Commands;

/**
 * Class ClearCanvas
 * @package GraphicalEditor\Commands
 */
class ClearCanvas extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        $this->image->clearCanvas();
    }
}
