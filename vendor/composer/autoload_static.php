<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfadca4fbb7969c45eab333f78f06b782
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfadca4fbb7969c45eab333f78f06b782::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfadca4fbb7969c45eab333f78f06b782::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
