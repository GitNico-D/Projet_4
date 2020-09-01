<?php

namespace App\src\Controllers;

use App\src\Core\Controller;
use Exception;

class ErrorController extends Controller
{
    public function error404($error)
    {
        try {
            echo $this->render('error404.html.twig', ['error' => $error->getMessage()]);
        } catch (Exception $e) {
            throw new Exception("Impossible d'afficher la page d'erreur". $e->getMessage());
        }
    }

    public function error500($error)
    {
        try {
            echo $this->render('error500.html.twig', ['error' => $error->getMessage()]);
        } catch (Exception $e) {
            throw new Exception("Impossible d'afficher la page d'erreur". $e->getMessage());
        }
    }
}
