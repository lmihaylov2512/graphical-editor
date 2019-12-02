<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

/**
 * Class DrawVerticalLine
 * @package GraphicalEditor\Commands
 */
class DrawVerticalLine extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        if (count($this->args) < 4) {
            throw new InvalidArgumentException('Invalid command arguments');
        }

        [$x, $y1, $y2, $colour] = $this->args;
        $this->image->drawVerticalLine($x, $y1, $y2, $colour);
    }
}
