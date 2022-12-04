<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae9c7a286793fc350d8f66fc24f48316
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae9c7a286793fc350d8f66fc24f48316::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae9c7a286793fc350d8f66fc24f48316::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae9c7a286793fc350d8f66fc24f48316::$classMap;

        }, null, ClassLoader::class);
    }
}