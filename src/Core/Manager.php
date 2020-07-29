<?php

namespace App\src\Core;

use App\src\Models\DAO;

class Manager extends DAO
{
    
    public function findOneBy(string $table, array $where)
    {
        $sqlRequest = "SELECT * FROM " . $table . " WHERE ";
        // $whereArray = [];
        foreach($where as $whereKey => $whereValue) 
        {
            $sqlRequest .= $whereKey . " = " . $whereValue;
        }
        $result = $this->createQuery($sqlRequest);
        $requestResult = $result->fetch();
        $result->closeCursor();
        return $requestResult;
    }

    // public function findOneBy(string $table, array $where)
    // {
    //     // $sqlRequest = "SELECT * FROM " . $table;
    //     $whereArray = [];
    //     foreach($where as $whereKey => $whereValue) 
    //     {
    //         $whereArray [] = $whereKey . " = " . $whereValue;
    //     }
    //     $sqlRequest = "SELECT * FROM " . $table . " WHERE " . implode(" AND " , $whereArray);
    //     var_dump($whereArray);
    //     var_dump($sqlRequest);

    //     // $result = $this->createQuery($sqlRequest, [implode(" AND ", $whereArrayh)]); 
    //     $result = $this->createQuery($sqlRequest); 
    //     $requestResult = $result->fetch();
    //     $result->closeCursor();
    //     return $requestResult;
    // }

    // public function findOneBy(string $table, string $whereKey, $whereKeyValue)
    // {
    //     $sqlRequest = "SELECT * FROM " . $table . " WHERE " . $whereKey . " = ?";
    //     foreach($whereArray as $whereKey => $whereValue) 
    //     {

    //     }
    //     $result = $this->createQuery($sqlRequest, [$whereKeyValue]);
    //     $requestResult = $result->fetch();
    //     $result->closeCursor();
    //     return $requestResult;
    // }

    public function findBy($table, $where, $orderBy, $limit = NULL, $className)
    {
        $sqlRequest = 'SELECT * FROM ' . $table;
        foreach($where as $whereKey => $whereValue) 
        { 
            $whereClause [] = $whereKey . ' = ' . $whereValue;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        if ($orderBy)
        {
            foreach($orderBy as $orderByKey => $orderByValue) 
            {
                $orderByArray [] = $orderByKey . ' ' . $orderByValue;
            }            
            $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
        }
        if ($limit != null)
        {          
            $sqlRequest .= ' LIMIT ' . $limit;
        } 
        else
        {
            $sqlRequest .= "'";
        }
        // var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest);
        $dataList = [];
        foreach ($result as $data)
        {
            $dataList [] = new $className($data);
        }
        $result->closeCursor(); 
        return $dataList;
    }

    // public function findBy(string $table, array $where, array $orderBy = null, int $limit = null)
    // {
    //     $sqlRequest = "SELECT * FROM " . $table ;
    //     var_dump($orderBy);
    //     var_dump($limit);
    //     foreach($where as $whereKey => $whereValue) 
    //     {
    //         $sqlRequest .= " WHERE " . $whereKey . " = " . $whereValue;
    //     }
    //     foreach($orderBy as $orderByKey => $orderByValue) 
    //     {
    //         $sqlRequest .= " ORDER BY " . $orderByKey . " " . $orderByValue;
    //     }
    //     var_dump($sqlRequest);
    //     // $sqlRequest .= " ORDER BY " . $orderBy['$orderValue'] . " LIMIT " . $limit;
    //     $result = $this->createQuery($sqlRequest);
    //     foreach ($result as $data)
    //     {
    //         $dataList [] = $data;
    //     }
    //     $result->closeCursor(); 
    //     return $dataList;
    // }

    // public function findBy(string $table, array $where, array $orderBy, int $limit)
    // {
    //     $sqlRequest = "SELECT * FROM " . $table . " WHERE " . $whereKey . " = ? ODER BY " . $orderBy . " LIMIT " . $limit;
    //     $result = $this->createQuery($sqlRequest, [$whereKeyValue]);
    //     foreach ($result as $data)
    //     {
    //         $dataList [] = $data[$selectData];
    //     }
    //     $result->closeCursor(); 
    //     return $dataList;
    // }

    public function findAll($table, $className)
    {
        $sqlRequest = "SELECT * FROM " . $table ;
        $result = $this->createQuery($sqlRequest);
        foreach ($result as $data)
        {
            $dataList [] = new $className($data);
        }
        $result->closeCursor();
        return $dataList;
    }
}