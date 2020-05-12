<?php 

require '../config/PDOConnection.php';
require '../vendor/autoload.php';

var_dump($_GET);
    if (isset($_GET['page']))
    {
        if ($_GET['page'] === 'singlenews')
        {
            require '../view/single.php';
        }
        else
        {
            echo 'Page introuvable !';
        }
    }
    else 
    {
        require '../view/home.php';
    }
   
?>      
 