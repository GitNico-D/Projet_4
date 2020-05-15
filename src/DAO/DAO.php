<?php

namespace App\src\DAO;

// require '..src/DAO/PDOConnection.php';
use PDO;
use Exception;

abstract class DAO 
{
    private $db;
    
    // CONST HOST = 'localhost';
    // CONST DB_CHARSET = 'utf8';
    // CONST DB_NAME = 'db_project_four';
    // CONST DB_HOST = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=' . DB_CHARSET;
    // CONST DB_USERNAME = 'root';
    // CONST DB_PASSWORD = '';

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
            var_dump($this->db);
            // $this->db = new PDO(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD);
            $this->db = new PDO('mysql:host=localhost;dbname=db_project_four;charset=utf8', 'root', '');
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
            var_dump($parameters);
            return $request;
        }
        $request = $this->checkDbConnection()->query($sql);
        $request->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $request;
    }

}