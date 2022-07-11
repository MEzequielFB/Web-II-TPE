<?php
require_once "app/models/LibrosModel.php";
require_once "app/views/LibrosView.php";

require_once "app/models/AutoresModel.php";

class LibrosController {

    private $model;
    private $view;

    function __construct() {

        $this->model = new LibrosModel();
        $this->view = new LibrosView();
    }

    function showHome() {

        $autoresModel = new AutoresModel();
        $autores = $autoresModel->getAutores();

        $libros = $this->model->getLibros();
        $this->view->showHome($libros, $autores);
    }

    function showLibro($params = null) {

        $autoresModel = new AutoresModel();
        $autores = $autoresModel->getAutores();

        $id = $params[":ID"];
        $libro = $this->model->getLibro($id);
        
        if ($libro) {
            $this->view->showLibro($libro, $autores);
        } else {
            $this->view->showError("El libro al que se quiere acceder no existe");
        }
    }

    function addLibro() {

        if (isset($_POST["tituloInput"]) && isset($_POST["generoInput"]) && isset($_POST["autorSelect"]) && isset($_POST["fechaInput"])) {

            $titulo = $_POST["tituloInput"];
            $autor = intval($_POST["autorSelect"]);
            $genero = $_POST["generoInput"];            
            $fecha = $_POST["fechaInput"];

            $id = $this->model->insertLibro($titulo, $autor, $genero, $fecha);
            if ($this->model->getLibro($id)) {

                header("Location: ".BASE_URL);
            } else {                
                $this->view->showError("No se pudo ingresar el nuevo libro");
            }
        }        
    }

    function deleteLibro($params = null) {

        $id = $params[":ID"];
        if ($this->model->getLibro($id)) {

            $this->model->deleteLibro($id);
            header("Location: ".BASE_URL);
        } else {
            $this->view->showError("El libro que se quiere eliminar no existe");
        }        
    }

    function editLibro($params = null) {        

        if (isset($_POST["tituloInput"]) && isset($_POST["generoInput"]) && isset($_POST["autorSelect"]) && isset($_POST["fechaInput"])) {

            $titulo = $_POST["tituloInput"];
            $autor = intval($_POST["autorSelect"]);
            $genero = $_POST["generoInput"];            
            $fecha = $_POST["fechaInput"];

            $id = $params[":ID"];
            if ($this->model->getLibro($id)) {

                $this->model->editLibro($titulo, $autor, $genero, $fecha, $id);
                header("Location: ".BASE_URL);
            } else {
                $this->view->showError("El libro que se quiere editar no existe");
            }
        }        
    }
}
?>