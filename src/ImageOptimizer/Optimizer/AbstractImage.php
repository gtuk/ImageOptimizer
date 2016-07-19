<?php

namespace ImageOptimizer\Optimizer;

/**
 * Class AbstractImage
 *
 * @package ImageOptimizer\Optimizer
 */
abstract class AbstractImage
{
    protected $binaryPath;

    /**
     * AbstractImage constructor.
     *
     * @param string $binaryPath
     */
    public function __construct($binaryPath)
    {
        $this->binaryPath = $binaryPath;
    }

    /**
     * Optimize image
     *
     * @param mixed $image
     *
     * @return void
     */
    abstract public function optimize($image);
}
