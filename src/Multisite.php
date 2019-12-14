<?php

namespace Apsg\Multisite;

class Multisite
{
    public static function config(string $key)
    {
        $domain = self::domain();

        return config('multisite.' . $domain . '.' . $key);
    }

    public static function domain()
    {
        return config('multisite.domain');
    }

    public static function cssPath()
    {
        return self::resourcePath('css');
    }

    public static function jsPath()
    {
        return self::resourcePath('js');
    }

    public static function resourcePath(string $type)
    {
        return public_path("{$type}/" . self::domain() . ".{$type}");
    }
}
