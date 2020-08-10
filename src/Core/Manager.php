<?php

namespace App\src\Core;

use App\src\Models\DAO;
use App\src\Models\Chapter;
use PDOStatement;

class Manager extends DAO
{
    /**
     * @var Chapter
     */
    // private $newChapter;

    // public function __construct()
    // {
    //     $this->newChapter = new Chapter;
    // }
    /**
     * findOneBy
     *
     * @param string $table
     * @param array $where
     * @return Chapter
     */
    public function findOneBy($table, $where)
    {
        var_dump($table);
        $sqlRequest = "SELECT * FROM " . $table . " WHERE ";
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = :" . $whereKey;
        }
        $result = $this->createQuery($sqlRequest, $where);
        $requestResult = $result->fetch();
        // $entity = 'App\src\Models\\' . ucfirst($table);
        // var_dump($requestResult);
        $result->closeCursor();
        // return new $entity($requestResult);
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
            foreach ($orderBy as $orderByKey => $orderByValue) {
                $sqlRequest .= $orderByKey . ' ' . $orderByValue;
            }
            $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
        }
        if ($limit) {
            $sqlRequest .= ' LIMIT ' . $limit;
        }
        $result = $this->createQuery($sqlRequest, $where);
        // $dataList = [];
        // $entity = 'App\src\Models\\' . ucfirst($table);
        // $entity = ucfirst($table);
        // $entity = $entity::class;
        // var_dump(file_exists("..\src\Models\\" . $entity . ".php"));
        // foreach ($result as $data) {
        //     $dataList [] = new $entity($data);
        // }
        // $result->closeCursor();
        foreach ($result as $data) {
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
        $entity = 'App\src\Models\\' . ucfirst($table);
        foreach ($result as $data) {
            $dataList [] = new $entity($data);
        }
        $result->closeCursor();
        var_dump($dataList);
        return $dataList;
    }
    
    /**
     * insertInto
     *
     * @param mixed $table
     * @param mixed $parameters
     * @return PDOStatement
     */
    // public function insertInto($table, $parameters)
    // {
    //     $sqlRequest = 'INSERT INTO ' . $table;
    //     var_dump($parameters);
    //     $arrayField = [];
    //     $arrayFieldValue = [];
    //     foreach ($parameters as $parametersKey => $parametersValue) {
    //         $arrayField [] = $parametersKey;
    //         $arrayFieldValue [] = " :" . $parametersKey;
    //     }
    //     var_dump($arrayField);
    //     $sqlRequest .= " (" . implode(", ", $arrayField) . ") VALUES (" . implode(", ", $arrayFieldValue) . ")";
    //     return $this->createQuery($sqlRequest, $par);
    // }

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
     * @param mixed $where
     * @return void
     */
    public function delete($table, $where)
    {
        $sqlRequest = "DELETE FROM " . $table;
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= " WHERE " . $whereKey . "= :" . $whereKey;
        }
        $this->createQuery($sqlRequest, $where);
    }
}
