<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit971ec7c7a2660282461cb69bdc9e994c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit971ec7c7a2660282461cb69bdc9e994c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit971ec7c7a2660282461cb69bdc9e994c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit971ec7c7a2660282461cb69bdc9e994c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
