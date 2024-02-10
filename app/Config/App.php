<?php

namespace App\Config;

class App{
    public static function AppName()
    {
        return getenv('APP_NAME');
    }
    public static function AppUrl()
    {
        return getenv('APP_URL');
    }
}