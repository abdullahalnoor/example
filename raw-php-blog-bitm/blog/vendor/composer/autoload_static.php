<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b3bbcaac1ba5dd2c07c841cd2e67a1d
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

    public static $classMap = array (
        'App\\classes\\Login' => __DIR__ . '/../..' . '/app/classes/Login.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b3bbcaac1ba5dd2c07c841cd2e67a1d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b3bbcaac1ba5dd2c07c841cd2e67a1d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b3bbcaac1ba5dd2c07c841cd2e67a1d::$classMap;

        }, null, ClassLoader::class);
    }
}
