<?php

namespace GraphicalEditor\Commands;

class ShowCanvas extends BaseCommand
{
    public function run(): void
    {
        echo "=>\n";
        echo "{$this->image}\n";
    }
}
