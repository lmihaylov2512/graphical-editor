<?php

namespace GraphicalEditor;

use GraphicalEditor\Commands\{
    CreateCanvas, ClearCanvas, DrawPixel, DrawVerticalLine,
    DrawHorizontalLine, FillRegion, ShowCanvas, Terminate
};
use GraphicalEditor\Exceptions\InvalidCommandException;
use GraphicalEditor\Commands\BaseCommand;

class Dispatcher
{
    /**
     * @var array
     */
    protected $commands = [
        'I' => CreateCanvas::class,
        'C' => ClearCanvas::class,
        'L' => DrawPixel::class,
        'V' => DrawVerticalLine::class,
        'H' => DrawHorizontalLine::class,
        'F' => FillRegion::class,
        'S' => ShowCanvas::class,
        'X' => Terminate::class,
    ];

    /**
     * @var Image
     */
    protected $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function dispatch(string $input): BaseCommand
    {
        $args = explode(' ', $input);
        $cmd = array_shift($args);

        if (!isset($this->commands[$cmd])) {
            throw new InvalidCommandException("Invalid '{$cmd}' command");
        }

        return new $this->commands[$cmd]($this->image, $args);
    }
}
