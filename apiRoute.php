<?php
require_once "Router.php";
require_once "api/ComentariosApiController.php";

$r = new Router();

$r->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "showComentariosLibro");
$r->addRoute("comentarios", "POST", "ComentariosApiController", "addComentarioLibro");
$r->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "removeComentario");

$r->Route($_GET["recurso"], $_SERVER["REQUEST_METHOD"]);
?>