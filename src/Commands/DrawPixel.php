<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

/**
 * Class DrawPixel
 * @package GraphicalEditor\Commands
 */
class DrawPixel extends BaseCommand
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
        $this->image->drawPixel($x, $y, $colour);
    }
}
