<?php

namespace ImageOptimizer\Provider\Optimization;

use Exception;

/**
 * Class Mozjpeg
 *
 * @package ImageOptimizer\Provider\Optimization
 */
class Mozjpeg extends AbstractOptimizationProvider
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
     *
     * @throws Exception
     */
    public function optimize($image)
    {
        $content = shell_exec($this->binaryPath.' -optimize '.escapeshellarg($image));

        if (!$content) {
            throw new Exception('There was an error during the optimization');
        }

        return $content;
    }
}
