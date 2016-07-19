<?php

namespace ImageOptimizer\Optimizer;

use Exception;

/**
 * Class Pngquant
 *
 * @package ImageOptimizer\Optimizer
 */
class Pngquant extends AbstractImage
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
     * @throws Exception
     */
    public function optimize($image)
    {
        $content = shell_exec($this->binaryPath.' - < '.escapeshellarg($image));

        if (!$content) {
            throw new Exception();
        }

        return $content;
    }
}
