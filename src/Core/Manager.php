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
    public function findOneBy(string $table, array $where)
    {
        $sqlRequest = "SELECT * FROM " . $table . " WHERE ";
        // $whereArray = [];
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = " . $whereValue;
        }
        $result = $this->createQuery($sqlRequest);
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
     * @param mixed $className
     * @return void
     */
    public function findBy($table, $where, $orderBy, $limit = null, $className)
    {
        $sqlRequest = 'SELECT * FROM ' . $table;
        foreach ($where as $whereKey => $whereValue) {
            $whereClause [] = $whereKey . ' = ' . $whereValue;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        if ($orderBy) {
            foreach ($orderBy as $orderByKey => $orderByValue) {
                $orderByArray [] = $orderByKey . ' ' . $orderByValue;
            }
            $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
        }
        if ($limit != null) {
            $sqlRequest .= ' LIMIT ' . $limit;
        } else {
            $sqlRequest .= "'";
        }
        // var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest);
        $dataList = [];
        foreach ($result as $data) {
            $dataList [] = new $className($data);
        }
        $result->closeCursor();
        return $dataList;
    }

    /**
     * findAll
     *
     * @param mixed $table
     * @param mixed $className
     * @return void
     */
    public function findAll($table, $className)
    {
        $sqlRequest = "SELECT * FROM " . $table ;
        $result = $this->createQuery($sqlRequest);
        foreach ($result as $data) {
            $dataList [] = new $className($data);
        }
        $result->closeCursor();
        return $dataList;
    }
}
