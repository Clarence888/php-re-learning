<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit58722cbb6f297e748a1f13ed15162c90
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GraphQL\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GraphQL\\' => 
        array (
            0 => __DIR__ . '/..' . '/webonyx/graphql-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit58722cbb6f297e748a1f13ed15162c90::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit58722cbb6f297e748a1f13ed15162c90::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
