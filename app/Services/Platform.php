<?php

namespace App\Services;

/**
 * Base class that all e-comerce platforms must instantiate
 */
abstract class Platform
{
    /**
     * Fetch items from the platform
     * @param string $path
     * @return array
     */
    abstract public function get(string $path);

    /**
     * Format product items
     * @param array $items
     * @return array
     */
    abstract public function formatProduct(array $items);
}