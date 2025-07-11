<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcb458e0f89f264a51a30b10b8dd7cbd
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcb458e0f89f264a51a30b10b8dd7cbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcb458e0f89f264a51a30b10b8dd7cbd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
