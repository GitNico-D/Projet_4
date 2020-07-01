<?php

namespace App\src\Controllers;

use App\src\Core\Controller;

class ErrorController extends Controller
{
//     public function __construct($message = null, $code = null)
//     {
//         $this->message = $message;
//         $this->code = $code;
//         var_dump($message, $code);
//     }

    public function error404($error)
    {
        echo $this->twig->render('Error404View.twig', ['error' => $error->getMessage()]);
    }

    public function error500($error)
    {
        echo $this->twig->render('Error500View.twig', ['error' => $error->getMessage()]);
    }
}