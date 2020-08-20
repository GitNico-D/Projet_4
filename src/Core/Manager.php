<?php

namespace App\src\Core;

// use App\src\Models\DAO;
use PDOStatement;
use Exception;
use ReflectionClass;

abstract class Manager extends PDOFactory
{
    protected $entity;
    protected $table;

    public function __construct()
    {
        $this->entity = "App\src\Models\\".ucfirst(str_replace('Manager', '', (new ReflectionClass($this))->getShortName()));
        $this->table = strtolower((str_replace('App\src\Models\\', '', $this->entity)));       
    }

    public function requestValidation($requestResult)
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
     * @param array $where
     * @return Chapter
     */
    public function findOneBy($where)
    {
        $table = $this->table;
        var_dump($this->table);
        $sqlRequest = "SELECT * FROM " . $this->table . " WHERE ";
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = :" . $whereKey;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $requestResult = $result->fetch();
        $result->closeCursor();
        $this->requestValidation($requestResult);
        return new $this->entity($requestResult);
    }

    // public function findOneBy($table, $where)
    // {
    //     var_dump($where);
    //     $requestResult = $this->findBy($table, $where, 1);
    //     var_dump($requestResult);
    //     $this->requestValidation($table, $requestResult);
    //     return $requestResult;
    // }

    /**
     * findBy
     *
     * @param mixed $where
     * @param mixed $limit
     * @param mixed $orderBy
     * @return array|void
     */
    public function findBy($where, $limit = null, $orderBy = null)
    {
        $sqlRequest = 'SELECT * FROM ' . $this->table;
        $whereClause = [];
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
        $entityList = [];
        var_dump($sqlRequest);
        foreach ($result as $data) {
            $entityList [] = new $this->entity($data);
        }
        $result->closeCursor();
        return $entityList;
    }

    /**
     * findAll
     *
     * @return array
     */
    public function findAll()
    {
        $sqlRequest = "SELECT * FROM " . $this->table;
        $result = $this->createQuery($sqlRequest);
        $entityList = [];
        foreach ($result as $data) {
            $entityList [] = new $this->entity($data);
        }
        $result->closeCursor();
        var_dump($sqlRequest);
        return $entityList;
    }

    /**
     * insertInto
     *
     * @param $newEntity
     * @return PDOStatement
     */
    public function insertInto($newEntity)
    {
        $sqlRequest = 'INSERT INTO ' . $this->table;
        $properties = $newEntity->getProperties();
        var_dump($properties);
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
     * @param $updateEntity
     * @return void|bool|PDOStatement
     */
    public function update($updateEntity)
    {
        $sqlRequest = "UPDATE " . $this->table . " SET ";
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
     * @param $deleteEntity
     * @return void
     */
    public function delete($deleteEntity)
    {
        var_dump($deleteEntity);

        $sqlRequest = "DELETE FROM " . $this->table . " WHERE id = ?";
        var_dump($sqlRequest);
        $this->createQuery($sqlRequest, [$deleteEntity->getId()]);
        var_dump($this->createQuery($sqlRequest, [$deleteEntity->getId()]));
    }
}
