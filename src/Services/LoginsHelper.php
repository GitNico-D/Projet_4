<?php

namespace App\src\Services;

class LoginsHelper
{
    
    public static function checkAdminConnected(Array $session)
    {
        if (array_key_exists('loginsEmail', $session) && isset($session['loginsEmail']))
        {
            $isAdmin = true;
        } 
        else 
        {
            $isAdmin = false;
            echo("Vous n'êtes pas administrateur");
        }
        return $isAdmin;
    }
}