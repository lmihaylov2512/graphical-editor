<?php

namespace GraphicalEditor\Commands;

use GraphicalEditor\Image;

abstract class BaseCommand
{
    /**
     * @var Image
     */
    protected $image;
    /**
     * @var array
     */
    protected $args;

    public function __construct(Image $image, array $args)
    {
        $this->image = $image;
        $this->args = $args;
    }

    abstract public function run(): void;
}
