<?php
require_once "app/models/AutoresModel.php";
require_once "app/views/AutoresView.php";

require_once "app/models/LibrosModel.php";

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

    function showAutorLibros($params = null) {

        $librosModel = new LibrosModel();

        $id = $params[":ID"];
        $autor = $this->model->getAutor($id);
        if ($autor) {

            $libros = $librosModel->getLibrosByAutor($id);
            $this->view->showAutorLibros($autor, $libros);
        } else {
            $this->view->showAutorLibros(null, null);
        }
    }
}
?>