<?php 

require '../config/PDOConnection.php';
require '../vendor/autoload.php';

var_dump($_GET);
    if (isset($_GET['page']))
    {
        if ($_GET['page'] === 'singlearticle')
        {
            require '../view/singlearticle.php';
        }
        else
        {
            echo 'Page introuvable !';
        }
    }
    else 
    {
        require '../view/homearticle.php';
    }
   
?>      
 