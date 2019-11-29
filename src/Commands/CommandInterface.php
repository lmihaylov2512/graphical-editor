<?php

namespace GraphicalEditor\Commands;

use GraphicalEditor\Image;

interface CommandInterface
{
    public function __construct(Image $image, array $args);

    public function run(): void;
}
