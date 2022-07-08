<?php
require_once "app/models/AutoresModel.php";
require_once "app/views/AutoresView.php";

class AutoresController {

    private $model;
    private $view;
    
    function __construct() {

        $this->model = new AutoresModel();
        $this->view = new AutoresView();
    }

    function showAutores() {

        $autores = $this->model->getAutores();
        $this->view->showAutores($autores);
    }
}
?>