<?php

namespace GraphicalEditor;

use GraphicalEditor\Exceptions\InvalidPixelException;
use InvalidArgumentException;

/**
 * Class Image
 * @package GraphicalEditor
 */
class Image
{
    /**
     * @var array
     */
    protected $config = [];
    /**
     * @var array
     */
    protected $defaultConfig = [
        'whiteColour' => 'O',
        'maxCols' => 250,
        'maxRows' => 250,
    ];
    /**
     * @var array
     */
    protected $canvas = [];
    /**
     * @var int
     */
    protected $cols = 0;
    /**
     * @var int
     */
    protected $rows = 0;

    /**
     * Image constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->defaultConfig, $config);
    }

    /**
     * Creates a new canvas.
     *
     * @param int $cols
     * @param int $rows
     */
    public function createCanvas(int $cols, int $rows): void
    {
        if ($cols > $this->config['maxCols']) {
            throw new InvalidArgumentException('Exceed the maximum columns number');
        }
        if ($rows > $this->config['maxRows']) {
            throw new InvalidArgumentException('Exceed the maximum rows number');
        }

        $this->cols = $cols;
        $this->rows = $rows;
        $this->resetCanvas();
    }

    /**
     * Cleans the canvas.
     */
    public function clearCanvas(): void
    {
        $this->resetCanvas();
    }

    /**
     * Resets the canvas.
     */
    protected function resetCanvas(): void
    {
        $this->canvas = array_fill(1, $this->rows, array_fill(1, $this->cols, $this->config['whiteColour']));
    }

    /**
     * Returns the canvas.
     *
     * @return array
     */
    public function getCanvas(): array
    {
        return $this->canvas;
    }

    /**
     * Draws a pixel.
     *
     * @param int $x
     * @param int $y
     * @param string $colour
     * @throws InvalidPixelException
     */
    public function drawPixel(int $x, int $y, string $colour): void
    {
        if (!isset($this->canvas[$y][$x])) {
            throw new InvalidPixelException("Invalid pixel at ($x;$y}) coordinates");
        }

        $this->canvas[$y][$x] = $colour;
    }

    /**
     * Draws a vertical line.
     *
     * @param int $x
     * @param int $y1
     * @param int $y2
     * @param string $colour
     * @throws InvalidPixelException
     */
    public function drawVerticalLine(int $x, int $y1, int $y2, string $colour): void
    {
        $startY = min($y1, $y2);
        $endY = max($y1, $y2);

        for ($y = $startY; $y <= $endY; $y++) {
            $this->drawPixel($x, $y, $colour);
        }
    }

    /**
     * Draws a horizontal line.
     *
     * @param int $x1
     * @param int $x2
     * @param int $y
     * @param string $colour
     * @throws InvalidPixelException
     */
    public function drawHorizontalLine(int $x1, int $x2, int $y, string $colour): void
    {
        $startX = min($x1, $x2);
        $endX = max($x1, $x2);

        for ($x = $startX; $x <= $endX; $x++) {
            $this->drawPixel($x, $y, $colour);
        }
    }

    /**
     * Fills a canvas region.
     * It implements the flood fill algorithm.
     *
     * @param int $x
     * @param int $y
     * @param string $colour
     * @throws InvalidPixelException
     */
    public function fillRegion(int $x, int $y, string $colour): void
    {
        $pixels = [];
        $pixels[] = ['x' => $x, 'y' => $y];

        while (!empty($pixels)) {
            $next = array_pop($pixels);
            $x = $next['x'];
            $y = $next['y'];

            $this->drawPixel($x, $y, $colour);
            $pixels = array_merge($pixels, $this->getNeighborEmptyPixels($x, $y));
        }
    }

    /**
     * Returns a list that contains empty neighbor pixels.
     *
     * @param int $x
     * @param int $y
     * @return array
     */
    protected function getNeighborEmptyPixels(int $x, int $y): array
    {
        $pixels = [];

        // check the top pixel
        if ($this->isEmptyPixel($x, $y - 1)) {
            $pixels[] = ['x' => $x, 'y' => $y - 1];
        }
        // check the bottom pixel
        if ($this->isEmptyPixel($x, $y + 1)) {
            $pixels[] = ['x' => $x, 'y' => $y + 1];
        }
        // check the left pixel
        if ($this->isEmptyPixel($x - 1, $y)) {
            $pixels[] = ['x' => $x - 1, 'y' => $y];
        }
        // check the right pixel
        if ($this->isEmptyPixel($x + 1, $y)) {
            $pixels[] = ['x' => $x + 1, 'y' => $y];
        }

        return $pixels;
    }

    /**
     * Determines whether a specific pixel is empty (white colour).
     *
     * @param int $x
     * @param int $y
     * @return bool
     */
    public function isEmptyPixel(int $x, int $y): bool
    {
        return isset($this->canvas[$y][$x]) && $this->canvas[$y][$x] === $this->config['whiteColour'];
    }

    /**
     * Returns string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        $image = '';

        foreach ($this->canvas as $cols) {
            $image .= implode($cols);
            $image .= "\n";
        }

        return $image;
    }
}
