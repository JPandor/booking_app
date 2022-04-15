<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit226132b154443d8254bfe574942c702b
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit226132b154443d8254bfe574942c702b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit226132b154443d8254bfe574942c702b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit226132b154443d8254bfe574942c702b::$classMap;

        }, null, ClassLoader::class);
    }
}
