<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitee7e2ec58382f3e4b81a234d45409afe
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
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitee7e2ec58382f3e4b81a234d45409afe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitee7e2ec58382f3e4b81a234d45409afe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitee7e2ec58382f3e4b81a234d45409afe::$classMap;

        }, null, ClassLoader::class);
    }
}
