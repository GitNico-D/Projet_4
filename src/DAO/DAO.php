<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO 
{
    private $db_name;
    private $db_username;
    private $db_password;
    private $db_host;
    private $db;

    // public function __construct($db_name, $db_host = 'localhost', $db_username = 'root', $db_password = '')
    // {
    //     $this->db_host = $db_host;
    //     $this->db_username = $db_username;
    //     $this->db_password = $db_password;
    //     $this->db_name = $db_name;
    // }

    public function checkDbConnection()
    {
        if($this->db === null)
        {
            return $this->getDb();
        }    
        else
        {
            return $this->db;
        }
    }

    public function getDb()
    {
        try
        {
            $this->db = new PDO('mysql:dbname=db_project_four;host=localhost;charset=utf8', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'Connection OK !';
            return $this->db;
        }
        catch (Exception $errorConnexion)
        {
            die('Erreur de connection : ' . $errorConnexion->getMessage());
        }
    }

    public function createQuery($sql, $parameters = null)
    {
        if ($parameters)
        {
            $request = $this->checkDbConnection()->prepare($sql);
            $request->setFetchMode(PDO::FETCH_CLASS, static::class);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->checkDbConnection()->query($sql);
        $request->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $request;
    }

}