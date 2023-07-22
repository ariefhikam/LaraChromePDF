<?php

namespace ariefhikam\LaraChromePdf;

use Illuminate\Support\Facades\Facade;

class LaraChromePdf extends Facade
{
    /**
     * Bounce fake
     *
     * @return void
     */
    public static function fake()
    {
        static::swap();
    }
}
