<?php

namespace ImageOptimizer\Provider\Optimization;

use Exception;

/**
 * Class Pngquant
 *
 * @package ImageOptimizer\Provider\Optimization
 */
class Pngquant extends AbstractOptimizationProvider
{
    /**
     * Pngquant constructor.
     *
     * @param string $binaryPath
     */
    public function __construct($binaryPath)
    {
        parent::__construct($binaryPath);
    }

    /**
     * Optimize png
     *
     * @param mixed $image
     *
     * @return string
     *
     * @throws Exception
     */
    public function optimize($image)
    {
        $content = shell_exec($this->binaryPath.' - < '.escapeshellarg($image));

        if (!$content) {
            throw new Exception('There was an error during the optimization');
        }

        return $content;
    }
}
