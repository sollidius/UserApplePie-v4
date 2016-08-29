<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64782013e8d2c644ea694219ab20c272
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit64782013e8d2c644ea694219ab20c272::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64782013e8d2c644ea694219ab20c272::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
