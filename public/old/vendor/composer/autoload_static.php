<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1755a9ab6590f75097979122efdeb9a4
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'soloproyectos\\' => 14,
        ),
        'S' => 
        array (
            'Symfony\\Component\\CssSelector\\' => 30,
        ),
        'D' => 
        array (
            'DOMWrap\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'soloproyectos\\' => 
        array (
            0 => __DIR__ . '/..' . '/soloproyectos-php/array/src',
            1 => __DIR__ . '/..' . '/soloproyectos-php/css/src',
            2 => __DIR__ . '/..' . '/soloproyectos-php/css-parser/src',
            3 => __DIR__ . '/..' . '/soloproyectos-php/dom/src',
            4 => __DIR__ . '/..' . '/soloproyectos-php/dom-node/src',
            5 => __DIR__ . '/..' . '/soloproyectos-php/text/src',
            6 => __DIR__ . '/..' . '/soloproyectos-php/text-parser/src',
            7 => __DIR__ . '/..' . '/soloproyectos-php/text-tokenizer/src',
        ),
        'Symfony\\Component\\CssSelector\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/css-selector',
        ),
        'DOMWrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/scotteh/php-dom-wrapper/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1755a9ab6590f75097979122efdeb9a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1755a9ab6590f75097979122efdeb9a4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
