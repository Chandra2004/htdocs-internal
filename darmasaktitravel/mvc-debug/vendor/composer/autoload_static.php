<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit274bbf73aff0f277b47be6e02d2a3477
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Darmasaktitravel\\Carrent\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Darmasaktitravel\\Carrent\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit274bbf73aff0f277b47be6e02d2a3477::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit274bbf73aff0f277b47be6e02d2a3477::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit274bbf73aff0f277b47be6e02d2a3477::$classMap;

        }, null, ClassLoader::class);
    }
}
