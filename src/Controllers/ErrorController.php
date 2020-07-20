<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class ErrorController extends Controller
{
    public function error404($error)
    {
        echo $this->twig->render('Error404View.html.twig', ['error' => $error->getMessage()]);
    }

    public function error500($error)
    {
        echo $this->twig->render('Error500View.html.twig', ['error' => $error->getMessage()]);
    }
}