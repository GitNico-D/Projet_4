<?php

namespace App\src\DAO;

// require '..src/DAO/PDOConnection.php';
use PDO;
use Exception;

abstract class DAO 
{
    private $db;

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
            $this->db = new PDO(DB_HOST, DB_USERNAME, DB_PASSWORD);
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