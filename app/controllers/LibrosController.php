<?php
require_once "app/models/LibrosModel.php";
require_once "app/views/LibrosView.php";

class LibrosController {

    private $model;
    private $view;

    function __construct() {

        $this->model = new LibrosModel();
        $this->view = new LibrosView();
    }

    function showHome() {

        $libros = $this->model->getLibros();
        $this->view->showHome($libros);
    }

    function showLibro($params = null) {

        $id = $params[":ID"];
        $libro = $this->model->getLibro($id);
        
        if ($libro) {
            $this->view->showLibro($libro);
        } else {
            $this->view->showLibro(null);
        }
    }
}
?>