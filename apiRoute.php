<?php
require_once "Router.php";
require_once "api/ComentariosApiController.php";

$r = new Router();

$r->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "showComentariosLibro");

$r->Route($_GET["recurso"], $_SERVER["REQUEST_METHOD"]);
?>