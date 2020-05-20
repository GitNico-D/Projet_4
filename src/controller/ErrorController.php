<?php

namespace App\src\controller;

class ErrorController
{
    public function errorPageNotFound()
    {
        require '../view/errorView.php';
    }
}