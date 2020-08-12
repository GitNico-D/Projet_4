<?php

namespace App\src\Core;

use App\src\Models\DAO;
use PDOStatement;

class Manager extends DAO
{
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
        return $requestResult;
    }
   
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
        // var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, $where);
        $dataList = [];
        // $entity = 'App\src\Models\\' . ucfirst($table);
        // $entity = ucfirst($table);
        // $entity = $entity::class;
        // var_dump(file_exists("..\src\Models\\" . $entity . ".php"));
        // foreach ($result as $data) {
        //     $dataList [] = new $entity($data);
        // }
        // $result->closeCursor();
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
        // $entity = 'App\src\Models\\' . ucfirst($table);
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
    public function delete($table, $entity)
    {
        $sqlRequest = "DELETE FROM " . $table;
        foreach ($entity as $entityKey => $entityValue) {
            $sqlRequest .= " WHERE " . $entityKey . "= :" . $entityKey;
        }
        $this->createQuery($sqlRequest, $entity);
    }
}
