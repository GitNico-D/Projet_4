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

    // public function loginsVerification()
    // {
    //     $sqlRequest = 'SELECT loginsEmail, loginsPassword FROM logins';
    //     $result = $this->createQuery($sqlRequest);
    //     $loginsEmailList = [];
    //     foreach($result as $logins)
    //     {
    //         $loginsEmailList [] = $this->createLoginsObject($logins);
    //         // var_dump($loginsEmailList);
    //     }
    //     $result->closeCursor();
    //     return $loginsEmailList;
    // }

    public function loginsVerification($loginsEmail)
    {
        $sqlRequest = 'SELECT * FROM logins WHERE loginsEmail = ?';
        $result = $this->createQuery($sqlRequest, [$loginsEmail]);
        $loginsPassword = $result->fetch();
        $result->closeCursor();
        return $this->createLoginsObject($loginsPassword);
    }

    // public function passwordHash()
    // {
    //     return password_hash('AdminPassword', PASSWORD_DEFAULT);

    // }









}