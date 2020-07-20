<?php

namespace App\src\Models;

use PDO;

abstract class DAO 
{
    private $db;
    
    private function getDb()
    {
        // $config = yaml_parse_file('dbConfig.yaml');
        // $dbHost = $dbConfig['DATABASE_HOST'];
        // var_dump($config);
        if ($this->db === null)
        {
            try
            {
                $this->db = new PDO(DB_HOST, DB_USERNAME, DB_PASSWORD);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db;
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

    public function createQuery($sql, $parameters = NULL)
    {
        if ($parameters)
        {
            $request = $this->getDb()->prepare($sql);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->getDb()->query($sql);
        return $request;
    }

}