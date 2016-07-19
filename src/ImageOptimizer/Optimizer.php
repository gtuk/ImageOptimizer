<?php

namespace ImageOptimizer;

use Exception;
use ImageOptimizer\Optimizer\Gifsicle;
use ImageOptimizer\Optimizer\Mozjpeg;
use ImageOptimizer\Optimizer\Pngquant;

/**
 * Class Optimizer
 *
 * @package ImageOptimizer
 */
class Optimizer
{
    const PNGQUANT_PATH = 'pngquant';
    const MOZJPEG_PATH  = 'mozjpeg';
    const GIFSICLE_PATH = 'gifsicle';

    protected $pngquant;
    protected $mozjpeg;
    protected $gifsicle;

    /**
     * Optimizer constructor.
     *
     * @param array $optimizer
     *
     * @throws Exception
     */
    public function __construct($optimizer = array())
    {
        if (! isset($optimizer[self::PNGQUANT_PATH]) ||
            ! isset($optimizer[self::MOZJPEG_PATH]) ||
            ! isset($optimizer[self::GIFSICLE_PATH])
        ) {
            throw new Exception('Optimizer not set');
        }

        if (! file_exists($optimizer[self::PNGQUANT_PATH]) ||
            ! file_exists($optimizer[self::MOZJPEG_PATH]) ||
            ! file_exists($optimizer[self::GIFSICLE_PATH])
        ) {
            throw new Exception('Optimizer not found');
        }

        $this->mozjpeg  = new Mozjpeg($optimizer[self::MOZJPEG_PATH]);
        $this->pngquant = new Pngquant($optimizer[self::PNGQUANT_PATH]);
        $this->gifsicle = new Gifsicle($optimizer[self::GIFSICLE_PATH]);
    }

    public function optimize($input, $output = '')
    {
        switch (pathinfo($input, PATHINFO_EXTENSION)) {
            case 'jpg':
            case 'jpeg':
                $content = $this->mozjpeg->optimize($input);
                break;
            case 'png':
                $content = $this->pngquant->optimize($input);
                break;
            case 'gif':
                $content = $this->gifsicle->optimize($input);
                break;
            default:
                throw new Exception('No valid file type');
        }

        if (! empty($output)) {
            file_put_contents($output, $content);
        } else {
            file_put_contents($input, $content);
        }
    }
}
