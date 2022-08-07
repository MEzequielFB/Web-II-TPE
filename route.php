<?php
require_once "Router.php";
require_once "app/controllers/LibrosController.php";
require_once "app/controllers/AutoresController.php";
require_once "app/controllers/UsuariosController.php";
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$r = new Router();

//Libros
$r->setDefaultRoute("LibrosController", "showHome");
$r->addRoute("libros/page/:PAGE", "GET", "LibrosController", "showHome"); //URL para la paginación de libros
$r->addRoute("libros/:ID", "GET", "LibrosController", "showLibro");
$r->addRoute("libros/add", "POST", "LibrosController", "addLibro");
$r->addRoute("libros/delete/:ID", "GET", "LibrosController", "deleteLibro");
$r->addRoute("libros/edit/:ID", "POST", "LibrosController", "editLibro");
$r->addRoute("libros/img/delete/:ID", "GET", "LibrosController", "deleteImgLibro");
$r->addRoute("libros/search/page/:PAGE", "GET", "LibrosController", "showLibrosSearch");

//Autores
$r->addRoute("autores", "GET", "AutoresController", "showAutores");
$r->addRoute("autores/:ID", "GET", "AutoresController", "showAutor");
$r->addRoute("autores/:ID/libros", "GET", "AutoresController", "showAutorLibros");
$r->addRoute("autores/add", "POST", "AutoresController", "addAutor");
$r->addRoute("autores/delete/:ID", "GET", "AutoresController", "deleteAutor");
$r->addRoute("autores/edit/:ID", "POST", "AutoresController", "editAutor");

//Login y registro
$r->addRoute("login", "GET", "UsuariosController", "showLogin");
$r->addRoute("login/verify", "POST", "UsuariosController", "verifyUser");
$r->addRoute("logout", "GET", "UsuariosController", "logout");
$r->addRoute("registro", "GET", "UsuariosController", "showRegistro");
$r->addRoute("registro/verify", "POST", "UsuariosController", "registrarUsuario");

//Gestión de usuarios
$r->addRoute("usuarios", "GET", "UsuariosController", "showUsuarios");
$r->addRoute("usuarios/:ID/permisos", "GET", "UsuariosController", "editPermisos");
$r->addRoute("usuarios/delete/:ID", "GET", "UsuariosController", "deleteUsuario");

$r->Route($_GET["accion"], $_SERVER["REQUEST_METHOD"]);
?>