<?php

namespace GraphicalEditor\Commands;

/**
 * Class ShowCanvas
 * @package GraphicalEditor\Commands
 */
class ShowCanvas extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        echo "=>\n";
        echo "{$this->image}\n";
    }
}
