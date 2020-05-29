<?php

namespace App\src\model;

class Logins
{
    private $loginsId;
    private $loginsEmail;
    private $loginsPassword;

    public function __construct(Array $loginsData)
    {
        $this->hydrate($loginsData);
    }

    public function hydrate(Array $data)
    {
        foreach ($data as $key => $loginsData)
        {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($loginsData);
            }
        }
    }

    //SETTERS

    public function setLoginsId($loginsId)
    {
        $this->loginsId = $loginsId;
    }

    public function setLoginsEmail($loginsEmail)
    {
        $this->loginsEmail = $loginsEmail;
    }

    public function setLoginsPassword($loginsPassword)
    {
        $this->loginsPassword = $loginsPassword;
    }

    //GETTERS

    public function getLoginsId()
    {
        return $this->loginsId;
    }

    public function getLoginsEmail()
    {
        return $this->loginsEmail;
    }

    public function getLoginsPassword()
    {
        return $this->loginsPassword;
    }
}