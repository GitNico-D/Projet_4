<?php

namespace App\src\Core;

use App\src\Models\DAO;

class Manager extends DAO
{
    public function findOneBy(string $table, string $whereKey, $whereKeyValue)
    {
        $sqlRequest = "SELECT * FROM " . $table . " WHERE " . $whereKey . " = ?";
        $result = $this->createQuery($sqlRequest, [$whereKeyValue]);
        $requestResult = $result->fetch();
        $result->closeCursor();
        return $requestResult;
    }

    public function findBy($selectData, string $table, string $whereKey, $whereKeyValue)
    {
        $sqlRequest = "SELECT " . $selectData . " FROM " . $table . " WHERE " . $whereKey . " = ?";
        $result = $this->createQuery($sqlRequest, [$whereKeyValue]);
        foreach ($result as $data)
        {
            $dataList [] = $data[$selectData];
        }
        $result->closeCursor(); 
        return $dataList;
    }

    public function findAll(string $table, string $whereKey, $whereKeyValue, $orderKey, $className)
    {
        $sqlRequest = "SELECT * FROM " . $table . " WHERE " . $whereKey . " = ? ORDER BY " . $orderKey;
        $result = $this->createQuery($sqlRequest, [$whereKeyValue]);
        foreach ($result as $data)
        {
            $dataList [] = new $className($data);
        }
        $result->closeCursor(); 
        return $dataList;
    }
}