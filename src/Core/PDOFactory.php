<?php

namespace App\src\Core;

use PDO;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $db = new PDO('mysql:host=localhost;dbname=db_project_four;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
