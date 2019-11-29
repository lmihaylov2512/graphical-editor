<?php

namespace GraphicalEditor\Commands;

class DrawHorizontalLine extends BaseCommand
{
    public function run(): void
    {
        [$x1, $x2, $y, $colour] = $this->args;

        $this->image->drawHorizontalLine($x1, $x2, $y, $colour);
    }
}
