<?php

namespace ImageOptimizer\Optimizer;

use Exception;

/**
 * Class Mozjpeg
 *
 * @package ImageOptimizer\Optimizer
 */
class Mozjpeg extends AbstractImage
{
    /**
     * Mozjpeg constructor.
     *
     * @param string $binaryPath
     */
    public function __construct($binaryPath)
    {
        parent::__construct($binaryPath);
    }

    /**
     * Optimize jpg
     *
     * @param mixed $image
     *
     * @return string
     * @throws Exception
     */
    public function optimize($image)
    {
        $content = shell_exec($this->binaryPath.' '.escapeshellarg($image));

        if (!$content) {
            throw new Exception();
        }

        return $content;
    }
}
