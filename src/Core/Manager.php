<?php

namespace App\src\Core;

use App\src\Models\DAO;

class Manager extends DAO
{
    
    /**
     * findOneBy
     *
     * @param string $table
     * @param array $where
     * @return void
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
        $entity = 'App\src\Models\\' . ucfirst($table);
        return new $entity($requestResult);
    }
   
    /**
     * findBy
     *
     * @param mixed $table
     * @param mixed $where
     * @param mixed $orderBy
     * @param mixed $limit
     * @return void
     */
    public function findBy($table, $where, $orderBy = null, $limit = null)
    {
        $sqlRequest = 'SELECT * FROM ' . $table;
        foreach ($where as $whereKey => $whereValue) {
            $whereClause [] = $whereKey . ' = :' . $whereKey;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        if ($orderBy) {
            foreach ($orderBy as $orderByKey => $orderByValue) {
                $orderByArray [] = $orderByKey . ' ' . $orderByValue;
            }
            $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
        }
        if ($limit) {
            $sqlRequest .= ' LIMIT ' . $limit;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $dataList = [];
        $entity = 'App\src\Models\\' . ucfirst($table);
        foreach ($result as $data) {
            $dataList [] = new $entity($data);
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
        $entity = 'App\src\Models\\' . ucfirst($table);
        foreach ($result as $data) {
            $dataList [] = new $entity($data);
        }
        $result->closeCursor();
        return $dataList;
    }
    
    /**
     * insertInto
     *
     * @param mixed $table
     * @param mixed $parameters
     * @return void
     */
    public function insertInto($table, $parameters)
    {
        $sqlRequest = 'INSERT INTO ' . $table;
        var_dump($parameters);
        foreach ($parameters as $parametersKey => $parametersValue) {
            $arrayField [] = $parametersKey; 
            $arrayFieldValue [] = " :" . $parametersKey;
        }
        $sqlRequest .= " (" . implode(", ", $arrayField) . ") VALUES (" . implode(", ", $arrayFieldValue) . ")";
        $insertLines = $this->createQuery($sqlRequest, $parameters);
        return $insertLines;
    }

    /**
     * update
     *
     * @param mixed $table
     * @param mixed $parameters
     * @param mixed $where
     * @return void
     */
    public function update($table, $parameters, $where)
    {
        $sqlRequest = 'UPDATE ' . $table . " SET ";
        $arraySet = [];
        $setArrayValues = [];
        foreach ($parameters as $parametersKey => $parametersValue) {
            $arrayValue [] = $parametersKey . "= :" . $parametersKey;
        }
        $sqlRequest .= implode(", ", $arrayValue);
        foreach ($where as $wherekey => $wherevalue) {
            $whereClause [] = $wherekey . "= :" . $wherekey;
            $parameters[$wherekey] = $wherevalue;
        }        
        $sqlRequest .= " WHERE " . implode($whereClause);
        $updatedLines = $this->createQuery($sqlRequest, $parameters);
        return $updatedLines;
    }

    /**
     * delete
     *
     * @param mixed $table
     * @param mixed $where
     * @return void
     */
    public function delete($table, $where)
    {
        $sqlRequest = 'DELETE FROM ' . $table;
        foreach($where as $whereKey => $whereValue) {
            $sqlRequest .= " WHERE " . $whereKey . "= :" . $whereKey;
        }
        var_dump($sqlRequest);
        $this->createQuery($sqlRequest, $where);
    }
}
