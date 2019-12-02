<?php

namespace GraphicalEditor\Commands;

use GraphicalEditor\Image;

/**
 * Class BaseCommand
 * @package GraphicalEditor\Commands
 */
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

    /**
     * BaseCommand constructor.
     * @param Image $image
     * @param array $args
     */
    public function __construct(Image $image, array $args)
    {
        $this->image = $image;
        $this->args = $args;
    }

    /**
     * Returns an arguments list.
     *
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * Executes the command.
     */
    abstract public function run(): void;
}
