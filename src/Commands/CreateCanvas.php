<?php

namespace GraphicalEditor\Commands;

use InvalidArgumentException;

class CreateCanvas extends BaseCommand
{
    public function run(): void
    {
        if (!isset($this->args[0], $this->args[1])) {
            throw new InvalidArgumentException('Invalid command arguments');
        }

        [$cols, $rows] = $this->args;
        $this->image->createCanvas($cols, $rows);
    }
}
