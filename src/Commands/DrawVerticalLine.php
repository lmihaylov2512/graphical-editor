<?php

namespace GraphicalEditor\Commands;

class DrawVerticalLine extends BaseCommand
{
    public function run(): void
    {
        [$x, $y1, $y2, $colour] = $this->args;

        $this->image->drawVerticalLine($x, $y1, $y2, $colour);
    }
}
