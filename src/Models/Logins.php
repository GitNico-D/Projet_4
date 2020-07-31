<?php

namespace App\src\Models;

use App\src\Core\Model;

class Logins extends Model
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $status;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //SETTERS

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    //GETTERS

    public function getid()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
