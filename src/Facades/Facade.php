<?php

namespace Ariefhikam\LaraChromePdf\Facades;

use Ariefhikam\LaraChromePdf\LaraChromePdf;

class Facade
{
    public static function __callStatic($method, $parameters)
    {
        $instance = new LaraChromePdf;

        return call_user_func_array([$instance, $method], $parameters);
    }
}
