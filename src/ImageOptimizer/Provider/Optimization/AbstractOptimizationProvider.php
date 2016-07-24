<?php

namespace ImageOptimizer\Provider\Optimization;

use Exception;

/**
 * Class AbstractOptimizationProvider
 *
 * @package ImageOptimizer\Provider\Optimization
 */
abstract class AbstractOptimizationProvider
{
    protected $binaryPath;

    /**
     * AbstractOptimizationProvider constructor.
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
     * @return string
     *
     * @throws Exception
     */
    abstract public function optimize($image);
}
