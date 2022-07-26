<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e8a3c2b6ec4136f9818759cf74113d8
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e8a3c2b6ec4136f9818759cf74113d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e8a3c2b6ec4136f9818759cf74113d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3e8a3c2b6ec4136f9818759cf74113d8::$classMap;

        }, null, ClassLoader::class);
    }
}
