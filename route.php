<?php
require_once "Router.php";
require_once "app/controllers/LibrosController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$r = new Router();

//Libros
$r->setDefaultRoute("LibrosController", "showHome");

$r->Route($_GET["accion"], $_SERVER["REQUEST_METHOD"]);
?>