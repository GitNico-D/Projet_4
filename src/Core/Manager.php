<?php

namespace App\src\Core;

// use App\src\Models\DAO;
use App\src\Core\PDOFactory;
use PDOStatement;
use Exception;
use ReflectionClass;

class Manager extends PDOFactory
{
    private $entity;
    private $table;

    public function __construct()
    {
        $this->entity = "App\src\Models\\".ucfirst(str_replace('Manager', '', (new ReflectionClass($this))->getShortName()));
        var_dump($this->entity);
        // $this->table = $this->getTableName();
        // var_dump($this->table);
        
    }

    public function requestValidation($table, $requestResult)
    {
        if($requestResult === false) {
            switch ($table) {
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
        // $table = $this->table;
        // var_dump($this->table);
        $sqlRequest = "SELECT * FROM " . $table . " WHERE ";
        var_dump($where);
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = :" . $whereKey;
        }
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, $where);
        $requestResult = $result->fetch();
        $result->closeCursor();
        // $this->requestValidation($this->table, $requestResult);
        return new $this->entity($requestResult);
    }

    // public function findOneBy($table, $where)
    // {
    //     return $this->findBy($table, $where, null, 1);
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
        var_dump($where);
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
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, $where);
        $entityList = [];
        var_dump($this->entity);
        foreach ($result as $data) {
            $entityList [] = new $this->entity($data);
        }
        $result->closeCursor();
        return $entityList;
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
        $entityList = [];
        foreach ($result as $data) {
            $entityList [] = new $this->entity($data);
        }
        $result->closeCursor();
        return $entityList;
    }

    /**
     * insertInto
     *
     * @param mixed $table
     * @param $entity
     * @return PDOStatement
     */
    public function insertInto($table, $newEntity)
    {
        $sqlRequest = 'INSERT INTO ' . $table;
        $properties = $newEntity->getProperties();
        $arrayField = [];
        $arrayFieldValue = [];
        foreach ($properties as $propertiesKey => $propertiesValue) {
            $arrayField [] = $propertiesKey;
            $arrayFieldValue [] = " :" . $propertiesKey;
        }
        $sqlRequest .= " (" . implode(", ", $arrayField) . ") VALUES (" . implode(", ", $arrayFieldValue) . ")";
        return $this->createQuery($sqlRequest, $properties);
    }

    /**
     * update
     *
     * @param mixed $table
     * @param mixed $parameters
     * @param mixed $where
     * @return void|bool|PDOStatement
     */
    public function update($table, $updateEntity)
    {
        $sqlRequest = "UPDATE " . $table . " SET ";
        $parameters = [];
        $properties = $updateEntity->getProperties();
        foreach ($properties as $propertiesKey => $propertiesValue) {
            $parameters [] = $propertiesKey . "= :" . $propertiesKey;
            if($propertiesKey == 'id')
            {
                $whereClause = [$propertiesKey => $updateEntity->getId()];                
            }
        }
        array_push($properties, $whereClause);
        $sqlRequest .= implode(", ", $parameters) . " WHERE id = :id";
        return $this->createQuery($sqlRequest, $properties);
    }

    /**
     * delete
     *
     * @param mixed $table
     * @param $entity
     * @return void
     */
    public function delete($table, $deleteEntity)
    {
        $sqlRequest = "DELETE FROM " . $table . " WHERE id= :id";
        $id = $deleteEntity->getId();
        $this->createQuery($sqlRequest, [ $id]);
    }

    public function getTableName()
    {
        $managerEntity = (new ReflectionClass($this))->getShortName();
        return strtolower(str_replace('Manager', '', $managerEntity));
    }
}
