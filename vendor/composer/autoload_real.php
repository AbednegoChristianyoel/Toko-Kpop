<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4a1ece6bff20ee8dd8e44f74c3f01afc
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

        spl_autoload_register(array('ComposerAutoloaderInit4a1ece6bff20ee8dd8e44f74c3f01afc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4a1ece6bff20ee8dd8e44f74c3f01afc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4a1ece6bff20ee8dd8e44f74c3f01afc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
