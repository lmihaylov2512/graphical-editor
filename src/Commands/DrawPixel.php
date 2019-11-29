<?php

namespace GraphicalEditor\Commands;

class DrawPixel extends BaseCommand
{
    public function run(): void
    {
        [$x, $y, $colour] = $this->args;

        $this->image->drawPixel($x, $y, $colour);
    }
}
