<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d075f3b41e045ccd1c515c69a9f0772
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'Jacwright\\RestServer' => 
            array (
                0 => __DIR__ . '/..' . '/jacwright/restserver/source',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit5d075f3b41e045ccd1c515c69a9f0772::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
