<?php

namespace App\src\Models;

use PDO;
// use App\src\Core\PDOFactory;

abstract class DAO 
{
    private $db;
    
    private function getDb()
    {
        if ($this->db === null)
        {
            try
            {
                // $this->db = new PDO(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD);
                $this->db = new PDO('mysql:host=localhost;dbname=db_project_four;charset=utf8', 'root', '');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo 'Connection OK !';
                return $this->db;
                // PDOFactory::getMysqlConnection()
            }
            catch (Exception $errorConnexion)
            {
                die('Erreur de connection : ' . $errorConnexion->getMessage());
            }
        }
        else 
        {
            return $this->db;
        }
    }

    public function createQuery($sql, $parameters = null)
    {
        if ($parameters)
        {
            $request = $this->getDb()->prepare($sql);
            // $request->setFetchMode(PDO::FETCH_CLASS, static::class);
            // var_dump($parameters);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->getDb()->query($sql);
        // $request->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $request;
    }

}