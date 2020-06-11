<?php

class LoginsHelper
{
    
    public static function checkAdminConnected()
    {
        if (isset($_SESSION["loginsEmail"]))
        {
            if($_SESSION["loginsStatus"] === 1)
            var_dump($_SESSION["loginsStatus"]);
            $isAdmin = true;
        } else 
        {
            $isAdmin = false;
            echo("Vous n'êtes pas administrateur");
        }
        return $isAdmin;
    }
}