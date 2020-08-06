<?php

namespace App\src\Services;

class LoginsHelper
{
   
    /**
     * checkAdminConnected
     *
     * @param array $session
     * @return bool
     */
    public static function checkAdminConnected(array $session)
    {
        if (array_key_exists('loginsEmail', $session) && isset($session['loginsEmail'])) {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
        return $isAdmin;
    }
}
