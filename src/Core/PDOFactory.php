<?php

namespace App\src\Core;

use PDO;
use Exception;
class PDOFactory
{
    private $db;

    public static function getMysqlConnection()
    {
        $dbConfig = yaml_parse_file('../config/db-config.yml');
        if ($db === null) {
            try {
                $dbConfig = yaml_parse_file('../config/db-config.yml');
                $db = new \PDO(
                    'mysql:host=' . $dbConfig['DATABASE_HOST'] .';port=' . $dbConfig['DATABASE_PORT'] .
                                    ';dbname=' . $dbConfig['DATABASE_NAME'] .';charset=' . $dbConfig['DATABASE_CHARSET'],
                    $dbConfig['DATABASE_USERNAME'],
                    $dbConfig['DATABASE_PASSWORD']
                );
                return $db;
            } catch (Exception $errorConnexion) {
                die('Erreur de connection : ' . $errorConnexion->getMessage());
            }
        } else {
            return $db;
        }
    }

    public function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            var_dump($parameters);
            $request = $this->getDb()->prepare($sql);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->getDb()->query($sql);
        return $request;
    }
}
