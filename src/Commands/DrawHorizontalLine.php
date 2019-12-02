<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

/**
 * Class DrawHorizontalLine
 * @package GraphicalEditor\Commands
 */
class DrawHorizontalLine extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        if (count($this->args) < 4) {
            throw new InvalidArgumentException('Invalid command arguments');
        }

        [$x1, $x2, $y, $colour] = $this->args;
        $this->image->drawHorizontalLine($x1, $x2, $y, $colour);
    }
}
