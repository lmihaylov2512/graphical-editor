<?php

namespace GraphicalEditor\Commands;

class ClearCanvas extends BaseCommand
{
    public function run(): void
    {
        $this->image->clearCanvas();
    }
}
