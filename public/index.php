<?php 

require '../vendor/autoload.php';
require '../src/controller/Router.php';

session_start();

$router = new Router();
$router->launchApp();    
?>      
 