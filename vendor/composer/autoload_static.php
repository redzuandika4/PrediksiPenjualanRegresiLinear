<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit039d60eb03aa317142fdff9504e348d4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit039d60eb03aa317142fdff9504e348d4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit039d60eb03aa317142fdff9504e348d4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit039d60eb03aa317142fdff9504e348d4::$classMap;

        }, null, ClassLoader::class);
    }
}
