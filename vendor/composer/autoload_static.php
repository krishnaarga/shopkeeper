<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita030d431a87cb2dfe48a8d4b5b24b20d
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rakit\\Validation\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rakit\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/rakit/validation/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita030d431a87cb2dfe48a8d4b5b24b20d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita030d431a87cb2dfe48a8d4b5b24b20d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita030d431a87cb2dfe48a8d4b5b24b20d::$classMap;

        }, null, ClassLoader::class);
    }
}