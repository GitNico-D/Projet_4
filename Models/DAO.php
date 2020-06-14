<?php

abstract class DAO 
{
    private $db;
    
    // CONST HOST = 'localhost';
    // CONST DB_CHARSET = 'utf8';
    // CONST DB_NAME = 'db_project_four';
    // CONST DB_HOST = 'mysql:dbname=' . DB_NAME . ';host=' . HOST . ';charset=' . DB_CHARSET;
    // CONST DB_USERNAME = 'root';
    // CONST DB_PASSWORD = '';

    private function getDb()
    {
        if ($this->db === null)
        {
            try
            {
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
            var_dump($request);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->getDb()->query($sql);
        // $request->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $request;
    }

}