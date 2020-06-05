
<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($className)
    {
        // $className = str_replace('App', '', $className);
        // $className = str_replace('\\', '/', $className);
        var_dump($className);
        require_once 'Models/'. $className . '.php';
    }
}