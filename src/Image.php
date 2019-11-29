<?php

namespace GraphicalEditor;

use GraphicalEditor\Exceptions\InvalidPixelException;

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

    public function createCanvas(int $cols, int $rows): void
    {
        $this->cols = $cols;
        $this->rows = $rows;
        $this->resetCanvas();
    }

    public function clearCanvas(): void
    {
        $this->resetCanvas();
    }

    protected function resetCanvas(): void
    {
        $this->canvas = array_fill(1, $this->rows, array_fill(1, $this->cols, $this->config['whiteColour']));
    }

    /**
     * @return array
     */
    public function getCanvas(): array
    {
        return $this->canvas;
    }

    public function drawPixel(int $x, int $y, string $colour): void
    {
        if (!isset($this->canvas[$x][$y])) {
            throw new InvalidPixelException('');
        }

        $this->canvas[$y][$x] = $colour;
    }

    public function drawVerticalLine(int $x, int $y1, int $y2, string $colour): void
    {
        $startY = min($y1, $y2);
        $endY = max($y1, $y2);

        for ($y = $startY; $y <= $endY; $y++) {
            $this->drawPixel($x, $y, $colour);
        }
    }

    public function drawHorizontalLine(int $x1, int $x2, int $y, string $colour): void
    {
        $startX = min($x1, $x2);
        $endX = max($x1, $x2);

        for ($x = $startX; $x <= $endX; $x++) {
            $this->drawPixel($x, $y, $colour);
        }
    }

    public function fillRegion(int $x, int $y, string $colour): void
    {

    }

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
