<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class ErrorController extends Controller
{
    public function error404($error)
    {
        echo $this->twig->render('error404.html.twig', ['error' => $error->getMessage()]);
    }

    public function error500($error)
    {
        echo $this->twig->render('error500.html.twig', ['error' => $error->getMessage()]);
    }
}
