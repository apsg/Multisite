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
}
