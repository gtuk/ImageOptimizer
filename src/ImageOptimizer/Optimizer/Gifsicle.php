<?php

namespace ImageOptimizer\Optimizer;

use Exception;

/**
 * Class Gifsicle
 *
 * @package ImageOptimizer\Optimizer
 */
class Gifsicle extends AbstractImage
{
    /**
     * Gifsicle constructor.
     *
     * @param string $binaryPath
     */
    public function __construct($binaryPath)
    {
        parent::__construct($binaryPath);
    }

    /**
     * Optimize gif
     *
     * @param mixed $image
     *
     * @return string
     * @throws Exception
     */
    public function optimize($image)
    {
        $content = shell_exec($this->binaryPath.' -O2 '.escapeshellarg($image));

        if (!$content) {
            throw new Exception();
        }

        return $content;
    }
}
