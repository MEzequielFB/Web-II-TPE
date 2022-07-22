<?php
require_once "Router.php";
require_once "api/ApiController.php";

$r = new Router();


$r->Route($_GET["recurso"], $_SERVER["REQUEST_METHOD"]);
?>