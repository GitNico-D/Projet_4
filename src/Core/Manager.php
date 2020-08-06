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
        // $whereArray = [];
        foreach ($where as $whereKey => $whereValue) {
            $sqlRequest .= $whereKey . " = ?";
        }
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, $where);
        $requestResult = $result->fetch();
        $result->closeCursor();
        $entity = 'App\src\Models\\' . ucfirst($table);
        return new $entity($requestResult);
    }

    // /**
    //  * findBy
    //  *
    //  * @param mixed $table
    //  * @param mixed $where
    //  * @param mixed $orderBy
    //  * @param mixed $limit
    //  * @param mixed $className
    //  * @return void
    //  */
    // public function findBy($table, $where, $orderBy, $limit = null)
    // {
    //     $sqlRequest = 'SELECT * FROM ' . $table;
    //     var_dump($where);
    //     var_dump($orderBy);
    //     foreach ($where as $whereKey => $whereValue) {
    //         $whereClause [] = $whereKey . ' = ' . $whereValue;
    //     }
    //     $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
    //     if ($orderBy) {
    //         foreach ($orderBy as $orderByKey => $orderByValue) {
    //             $orderByArray [] = $orderByKey . ' ' . $orderByValue;
    //         }
    //         $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
    //     }
    //     // if ($limit != null) {
    //     //     $sqlRequest .= ' LIMIT ' . $limit;
    //     // }
    //     // else {
    //     //     $sqlRequest .= "'";
    //     // }
    //     // var_dump($sqlRequest);
    //     $result = $this->createQuery($sqlRequest);
    //     // var_dump($result);
    //     $dataList = [];
    //     $entity = 'App\src\Models\\' . ucfirst($table);
    //     foreach ($result as $data) {
    //         // var_dump($data);
    //         $dataList [] = new $entity($data);
    //     }
    //     $result->closeCursor();
    //     return $dataList;
    // }
   
    public function findBy($table, $where, $orderBy = null, $limit = null)
    {
        $sqlRequest = 'SELECT * FROM ' . $table;
        var_dump($where);
        var_dump($orderBy);
        foreach ($where as $whereKey => $whereValue) {
            $whereClause [] = $whereKey . ' = ' . $whereValue;
        }
        $sqlRequest .= ' WHERE ' . implode(' AND ', $whereClause);
        // if ($orderBy) {
        //     foreach ($orderBy as $orderByKey => $orderByValue) {
        //         $orderByArray [] = $orderByKey . ' ' . $orderByValue;
        //     }
        //     $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
        // }
        // if ($limit != null) {
        //     $sqlRequest .= ' LIMIT ' . $limit;
        // }
        // else {
        //     $sqlRequest .= "'";
        // }
        var_dump($sqlRequest);
        $result = $this->createQuery($sqlRequest, $where);
        var_dump($result);
        $dataList = [];
        $entity = 'App\src\Models\\' . ucfirst($table);
        foreach ($result as $data) {
            var_dump($data);
            $dataList [] = new $entity($data);
        }
        $result->closeCursor();
        return $dataList;
    }

    // public function findBy($table, $where, $orderBy = null, $limit = null)
    // {
    //     $sqlRequest = 'SELECT * FROM ' . $table;
    //     var_dump($where);
    //     var_dump($orderBy);
    //     $whereArrayKey = [];
    //     foreach ($where as $whereKey => $whereValue) {
    //         $whereArrayKey [] = $whereKey . ' = ?';
    //     }
    //     $sqlRequest .= ' WHERE ' . implode(' AND ', $whereArrayKey);
    //     var_dump($sqlRequest);
    //     // if ($orderBy !== null) {
    //     //     foreach ($orderBy as $orderByKey => $orderByValue) {
    //     //         $orderByArray [] = $orderByKey . ' ' . $orderByValue;
    //     //     }
    //     //     $sqlRequest .= ' ORDER BY ' . implode($orderByArray);
    //     // }
    //     var_dump($sqlRequest);
    //     // if ($limit !== null) {
    //     //     $sqlRequest .= ' LIMIT ' . $limit;
    //     // }
    //     // else {
    //     //     $sqlRequest .= "'";
    //     // }
    //     var_dump($sqlRequest);
    //     $result = $this->createQuery($sqlRequest, $where);
    //     var_dump($result);
    //     $dataList = [];
    //     $entity = 'App\src\Models\\' . ucfirst($table);
    //     foreach ($result as $data) {
    //         var_dump($data);
    //         $dataList [] = new $entity($data);
    //     }
    //     $result->closeCursor();
    //     return $dataList;
    // }


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

    // /**
    //  * insertInto
    //  *
    //  * @param mixed $table
    //  * @param mixed $tableLines
    //  * @param mixed $values
    //  * @return void
    //  */
    // public function insertInto($table, $tableLines, $values)
    // {
    //     $sqlRequest = 'INSERT INTO ' . $table . " (" . implode(", ", $tableLines). ") VALUES (";
    //     $arrayKey = [];
    //     foreach ($values as $key => $value) {
    //         $arrayKey [] = ":" . $key;
    //     }
    //     $sqlRequest .= implode(", ", $arrayKey) . ")";
    //     $insertLines = $this->createQuery($sqlRequest, $values);
    //     return $insertLines;
    // }

 /**
     * insertInto
     *
     * @param mixed $table
     * @param mixed $tableLines
     * @param mixed $values
     * @return void
     */
    public function insertInto($table, $fields, $fieldValues)
    {
        $
        $sqlRequest = 'INSERT INTO ' . $table . " (" . implode(", ", $fields). ") VALUES (";
        $arrayKey = [];
        foreach ($values as $key => $value) {
            $arrayKey [] = ":" . $key;
        }
        $sqlRequest .= implode(", ", $arrayKey) . ")";
        $insertLines = $this->createQuery($sqlRequest, $values);
        return $insertLines;
    }

    public function update($table, $setLines, $setValues, $where)
    {
        $sqlRequest = 'UPDATE ' . $table . " SET ";
        var_dump($setLines);
        var_dump($setValues);
        $arraySet = [];
        $setArrayValues = [];
        foreach ($setLines as $setLinesKey => $setLinesValue) {
            $arraySet [] = $setLinesKey . "= :" . $setLinesValue;
        }
        $sqlRequest .= implode(", ", $arraySet) . ")";
        var_dump($where);
        // $setArrayValues[$key] = "$" . $value;
        foreach ($where as $key => $value) {
            $key = ": " . $key;
        }
        // $sqlRequest .= " WHERE " . implode($whereKey) . "";
        var_dump($sqlRequest);
        $updatedLines = $this->createQuery($sqlRequest, $setValues);
        return $updatedLines;
    }

    public function delete($table, $where)
    {
        $sqlRequest = 'DELETE FROM' . $table;
        foreach($where as $whereKey => $whereValue) {
            $sqlRequest .= " WHERE " . $whereKey . "= ?";
        }
        $this->createQuery($sqlRequest, $where);
    }
}
