<?php

namespace App\src\Core;

use App\src\Models\DAO;
use PDOStatement;
use Exception;
use ReflectionClass;

class Manager extends DAO
// class Manager 
{
    // public function __construct()
    // {
    //     PDOFactory::getMysqlConnection();
    // }

    private $entity;

    public function __construct()
    {
        $this->entity = "App\src\Models\\".lcfirst(str_replace('Manager', '', (new ReflectionClass($this))->getShortName()));
    }

    public function requestValidation($table, $requestResult)
    {
        if($requestResult === false) {
            switch ($this->table) {
                case 'chapter':
                    throw new Exception ('Ce chapitre n\'existe pas');
                break;
                case 'comment':
                    throw new Exception ('Ce commentaire n\'existe pas');
                break;
                case 'logins':
                    throw new Exception ('Email ou mot de passe invalide');
                break;
            }
        }
    }

    /**
     * findOneBy
     *
     * @param string $table
     * @param array $where
     * @return Chapter
      */
    public function findOneBy($table, $where)
    {
        $sqlRequest = "SELECT * FROM " . $table . " WHERE ";
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = :" . $whereKey;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $requestResult = $result->fetch();
        $result->closeCursor();
        $this->requestValidation($table, $requestResult);
        return $requestResult;
    }

    // public function findOneBy($table, $where)
    // {
        // $this->findBy($table, $where, null, $limit = 1);
        // $this->requestValidation($table, $requestResult);
        // return $requestResult;
    // }
   
    /**
     * findBy
     *
     * @param mixed $table
     * @param mixed $where
     * @param mixed $orderBy
     * @param mixed $limit
     * @return array|void
     */
    public function findBy($table, $where, $orderBy = null, $limit = null)
    {
        $sqlRequest = 'SELECT * FROM ' . $table;
        $whereClause = [];
        $orderByArray = [];
        foreach ($where as $whereKey => $whereValue) {
            $whereClause [] = $whereKey . ' = :' . $whereKey;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        if ($orderBy) {
                $sqlRequest .= $orderByKey . ' ' . $orderByValue;
        }
        if ($limit) {
            $sqlRequest .= 'LIMIT ' . $limit;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $dataList = [];

         foreach ($result as $data) {
             $dataList [] = new $this->entity($data);
         }

         $result->closeCursor();
        while ($data = $result->fetch()) {
            $dataList [] = $data;
        }
        $result->closeCursor();
        return $dataList;
    }

    /**
     * findAll
     *
     * @param mixed $table
     * @return array
     */
    public function findAll($table)
    {
        $sqlRequest = "SELECT * FROM " . $table ;
        $result = $this->createQuery($sqlRequest);
        $dataList = [];
        foreach ($result as $data) {
            $dataList [] = $data;
        }
        $result->closeCursor();
        return $dataList;
    }

    /**
     * insertInto
     *
     * @param mixed $table
     * @param $entity
     * @return PDOStatement
     */
    public function insertInto($table, $parameters)
    {
        $sqlRequest = 'INSERT INTO ' . $table;
        var_dump($entity);
        $arrayField = [];
        $arrayFieldValue = [];
        foreach ($parameters as $parametersKey => $parametersValue) {
            $arrayField [] = $parametersKey;
            $arrayFieldValue [] = " :" . $parametersKey;
        }
        $sqlRequest .= " (" . implode(", ", $arrayField) . ") VALUES (" . implode(", ", $arrayFieldValue) . ")";
        return $this->createQuery($sqlRequest, $parameters);
    }

    /**
     * update
     *
     * @param mixed $table
     * @param mixed $parameters
     * @param mixed $where
     * @return void|bool|PDOStatement
     */
    public function update($table, $parameters, $where)
    {
        $sqlRequest = "UPDATE " . $table . " SET ";
        $arrayValue = [];
        var_dump($parameters);
        foreach ($parameters as $parametersKey => $parametersValue) {
            $arrayValue [] = $parametersKey . "= :" . $parametersKey;
        }
        $sqlRequest .= implode(", ", $arrayValue);
        $whereClause = [];
        foreach ($where as $wherekey => $wherevalue) {
            $whereClause [] = $wherekey . "= :" . $wherekey;
            $parameters[$wherekey] = $wherevalue;
        }
        $sqlRequest .= " WHERE " . implode($whereClause);
        return $this->createQuery($sqlRequest, $parameters);
    }

    /**
     * delete
     *
     * @param mixed $table
     * @param $entity
     * @return void
     */
    public function delete($table, $parameters)
    {
        $sqlRequest = "DELETE FROM " . $table;
        foreach ($parameters as $parametersKey => $parametersValue) {
            $sqlRequest .= " WHERE " . $parametersKey . "= :" . $parametersKey;
        }
        var_dump($sqlRequest);
        $this->createQuery($sqlRequest, $parameters);
    }
}
