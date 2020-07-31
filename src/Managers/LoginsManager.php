<?php

namespace App\src\Managers;

use App\src\Models\DAO;
use App\src\Models\Logins;

class LoginsManager extends DAO
{
    public function loginsVerification($loginsEmail)
    {
        $sqlRequest = 'SELECT * FROM logins WHERE email = ?';
        $result = $this->createQuery($sqlRequest, [$loginsEmail]);
        $loginsPassword = $result->fetch();
        $loginsObject = new Logins($loginsPassword);
        $result->closeCursor();
        return $loginsObject;
    }

    // public function passwordHash()
    // {
    //     return password_hash('AdminPassword', PASSWORD_DEFAULT);

    // }
}
