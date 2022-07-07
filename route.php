<?php
require_once "Router.php";
require_once "app/controllers/LibrosController.php";

$r = new Router();

//Libros
$r->setDefaultRoute("LibrosController", "showHome");

$r->Route($_GET["accion"], $_SERVER["REQUEST_METHOD"]);
?>