<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

/**
 * Class CreateCanvas
 * @package GraphicalEditor\Commands
 */
class CreateCanvas extends BaseCommand
{
    /**
     * @inheritDoc
     */
    public function run(): void
    {
        if (!isset($this->args[0], $this->args[1])) {
            throw new InvalidArgumentException('Invalid command arguments');
        }

        [$cols, $rows] = $this->args;
        $this->image->createCanvas($cols, $rows);
    }
}
