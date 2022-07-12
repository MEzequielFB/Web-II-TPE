<?php
require_once "Router.php";
require_once "app/controllers/LibrosController.php";
require_once "app/controllers/AutoresController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$r = new Router();

//Libros
$r->setDefaultRoute("LibrosController", "showHome");
$r->addRoute("libros/:ID", "GET", "LibrosController", "showLibro");
$r->addRoute("libros/add", "POST", "LibrosController", "addLibro");
$r->addRoute("libros/delete/:ID", "GET", "LibrosController", "deleteLibro");
$r->addRoute("libros/edit/:ID", "POST", "LibrosController", "editLibro");

//Autores
$r->addRoute("autores", "GET", "AutoresController", "showAutores");
$r->addRoute("autores/:ID/libros", "GET", "AutoresController", "showAutorLibros");
$r->addRoute("autores/add", "POST", "AutoresController", "addAutor");

$r->Route($_GET["accion"], $_SERVER["REQUEST_METHOD"]);
?>