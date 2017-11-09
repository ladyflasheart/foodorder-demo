<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43bf873d0aee2f2416515877aa557f96
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'F' => 
        array (
            'Foodorder\\Factory\\' => 18,
            'Foodorder\\Entity\\' => 17,
            'Foodorder\\Contract\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Foodorder\\Factory\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Factory',
        ),
        'Foodorder\\Entity\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Entity',
        ),
        'Foodorder\\Contract\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Contract',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit43bf873d0aee2f2416515877aa557f96::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43bf873d0aee2f2416515877aa557f96::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
