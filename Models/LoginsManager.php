<?php

require_once "./Models/Logins.php";
require_once "./Models/DAO.php";

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