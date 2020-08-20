<?php

namespace App\src\Managers;

use App\src\Models\DAO;
use App\src\Core\Manager;
use App\src\Models\Logins;

use Exception;

class LoginsManager extends Manager
{
    /**
     * loginsVerification
     *
     * @param mixed $loginsEmail
     * @return void
     */
    // public function loginsVerification($loginsEmail)
    // {
        // return new Logins($this->findOneBy($this->table, array('email' => $loginsEmail)));
    //     return $this->findOneBy($this->table, array('email' => $loginsEmail));

    // }

    // public function passwordHash()
    // {
    //     return password_hash('AdminPassword', PASSWORD_DEFAULT);

    // }
}
