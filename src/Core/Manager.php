<?php

namespace App\src\Core;

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

    /**
     * findOneBy
     *
     * @param mixed $where
     * @return void
     * @throws Exception
     */
    public function findOneBy($where)
    {
        $requestResult = $this->findBy($where, $orderBy, 1);
        // if ($requestResult[0] === null) {
        //     throw new Exception('Ce chapitre n\'existe pas');
        // } else {
            return $requestResult[0];
        // }
    }

    /**
     * findBy
     *
     * @param mixed $where
     * @param mixed $limit
     * @param mixed $orderBy
     * @return array|void
     */
    public function findBy($where, $orderBy = [], $limit = null)
    {
        $sqlRequest = 'SELECT * FROM ' . $this->table;
        $whereClause = [];

        foreach ($where as $whereKey => $whereValue) {
            $whereClause [] = $whereKey . ' = :' . $whereKey;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        if (!empty($orderBy)) {
            foreach ($orderBy as $orderByKey => $orderByValue) {
                $sqlRequest .= ' ORDER BY ' . $orderByKey . ' ' . $orderByValue;
            }
        }
        if ($limit) {
            $sqlRequest .= ' LIMIT ' . $limit;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $entityList = [];
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
        return $entityList;
    }

    /**
     * insertInto
     *
     * @param $newEntity
     * @return PDOStatement
     */
    public function insertInto(Model $newEntity)
    {
        $sqlRequest = 'INSERT INTO ' . $this->table;
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
     * @param $updateEntity
     * @return void|bool|PDOStatement
     */
    public function update(Model $updateEntity)
    {
        $sqlRequest = "UPDATE " . $this->table . " SET ";
        $parameters = [];
        $properties = $updateEntity->getProperties();
        foreach ($properties as $propertiesKey => $propertiesValue) {
            $parameters [] = $propertiesKey . "= :" . $propertiesKey;
            if ($propertiesKey == 'id') {
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
    public function delete(Model $deleteEntity)
    {
        $sqlRequest = "DELETE FROM " . $this->table . " WHERE id = ?";
        $this->createQuery($sqlRequest, [$deleteEntity->getId()]);
    }

    public function deleteFrom(Model $deleteEntity)
    {
        $class = get_class($deleteEntity);
        $param = strtolower(str_replace('App\src\Models\\', '', $class));
        $sqlRequest = "DELETE FROM " . $this->table . " WHERE " . $param . "Id = ?";
        $this->createQuery($sqlRequest, [$deleteEntity->getId()]);
    }
}
