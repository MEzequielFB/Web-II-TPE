<?php
require_once "Router.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$r = new Router();

$r->setDefaultRoute("LibrosController.php", "showHome");

$r->Route($_GET["accion"], $_SERVER["REQUEST_METHOD"]);
?>