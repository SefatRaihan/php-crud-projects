<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4e528baafe5bec00c2c2081e5c84304
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4e528baafe5bec00c2c2081e5c84304::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4e528baafe5bec00c2c2081e5c84304::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
