<?php

namespace Library\Framework\Core;

use Library\Framework\Container;

/**
 * Static accessor for Application instance
 * 
 * This class extends the base Container class allowing to use
 * the container methods directly. There is also static methods
 * to access the base Container class.
 */
class Application extends Container
{
    private static Container $instance;

    /**
     * Set the current application instance
     * @param Container $app Application instance
     * @return void
     */
    public static function setInstance(Container $app): void
    {
        static::$instance = $app;
    }

    /**
     * Get the current application instance
     * @return Container Returns current application instance
     */
    public static function getInstance(): Container
    {
        return static::$instance;
    }
}