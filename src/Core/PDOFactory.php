<?php

namespace App\src\Core;

use PDO;
use Exception;
abstract class PDOFactory
{
    private $db;

    private function getMysqlConnection()
    {
        $dbConfig = yaml_parse_file('../config/db-config.yml');
        if ($this->db === null) {
            try {
                $this->db = new PDO(
                    'mysql:host=' . $dbConfig['DATABASE_HOST'] .';port=' . $dbConfig['DATABASE_PORT'] .
                                    ';dbname=' . $dbConfig['DATABASE_NAME'] .';charset=' . $dbConfig['DATABASE_CHARSET'],
                    $dbConfig['DATABASE_USERNAME'],
                    $dbConfig['DATABASE_PASSWORD']
                );
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db;
            } catch (Exception $errorConnexion) {
                die('Erreur de connection : ' . $errorConnexion->getMessage());
            }
        } else {
            return $this->db;
        }
    }

    public function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            $request = $this->getMysqlConnection()->prepare($sql);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->getMysqlConnection()->query($sql);
        return $request;
    }
}
