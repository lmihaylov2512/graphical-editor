<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

/**
 * Class FillRegion
 * @package GraphicalEditor\Commands
 */
class FillRegion extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        if (!isset($this->args[0], $this->args[1], $this->args[2])) {
            throw new InvalidArgumentException('Invalid command arguments');
        }

        [$x, $y, $colour] = $this->args;
        $this->image->fillRegion($x, $y, $colour);
    }
}
