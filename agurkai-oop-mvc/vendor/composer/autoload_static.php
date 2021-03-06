<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a6e057f697a37c8d3fb6b25dcac56ec
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Veggies\\' => 8,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\HttpFoundation\\' => 33,
        ),
        'P' => 
        array (
            'Pea\\' => 4,
        ),
        'M' => 
        array (
            'Main\\' => 5,
        ),
        'G' => 
        array (
            'Greenhouse\\' => 11,
        ),
        'C' => 
        array (
            'Cucumber\\' => 9,
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Veggies\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Pea\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Main\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Greenhouse\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Cucumber\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc/controllers',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a6e057f697a37c8d3fb6b25dcac56ec::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a6e057f697a37c8d3fb6b25dcac56ec::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a6e057f697a37c8d3fb6b25dcac56ec::$classMap;

        }, null, ClassLoader::class);
    }
}
