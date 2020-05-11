<?php

namespace App\config;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        $className = str_replace('App', '', $className);
        $className = str_replace('\\', '/', $className);
        require '../' . $className . '.php';
    }
}