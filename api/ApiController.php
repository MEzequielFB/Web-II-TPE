<?php
require_once "api/ApiView.php";

//Clase abstracta que sirve como base para los api controllers de las entidades de la base de datos
abstract class ApiController {

    protected $view;
    protected $model; //Lo instancian los hijos

    private $data; //Body de HTTP Requests

    function __construct() {

        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    function getData() {

        return json_decode($this->data); //Convierte un String codificado en JSON a una variable php
    }
}
?>