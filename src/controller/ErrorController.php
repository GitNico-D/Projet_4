<?php

namespace App\src\controller;

class ErrorController
{
    public function errorPageNotFound($errorMessage)
    {
        require '../view/errorView.php';
    }
}