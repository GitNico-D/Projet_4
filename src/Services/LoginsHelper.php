<?php

namespace App\src\Services;

class LoginsHelper
{
    
    /**
     * checkAdminConnected
     *
     * @param Array $session
     * @return void
     */
    public static function checkAdminConnected(Array $session)
    {
        if (array_key_exists('loginsEmail', $session) && isset($session['loginsEmail']))
        {
            $isAdmin = true;
        } 
        else 
        {
            $isAdmin = false;
        }
        return $isAdmin;
    }
}