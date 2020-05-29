<?php

namespace App\src\DAO;

use App\src\model\Logins;

class LoginsManager extends DAO
{
    private $logins;

    public function createLoginsObject(array $data)
    {
        $logins = new Logins($data);
        return $logins;
    }

    public function loginsVerification()
    {
        $sqlRequest = 'SELECT loginsEmail, loginsPassword FROM logins';
        $result = $this->createQuery($sqlRequest);
        $loginsEmailList = [];
        foreach($result as $logins)
        {
            $loginsEmailList [] = $this->createLoginsObject($logins);
            // var_dump($loginsEmailList);
        }
        $result->closeCursor();
        return $loginsEmailList;
    }

    // public function loginsPasswordVerification()
    // {
    //     $sqlRequest = 'SELECT loginsPassword FROM logins';
    //     $result = $this->createQuery($sqlRequest);
    //     $loginsEmailList = [];
    //     foreach($result as $logins)
    //     {
    //         $loginsEmailList [] = $this->createloginsObject($logins);
    //         // var_dump($loginsEmailList);
    //     }
    //     $result->closeCursor();
    //     return $loginsEmailList;
    // }










}