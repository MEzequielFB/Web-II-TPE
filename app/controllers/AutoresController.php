<?php
require_once "app/models/AutoresModel.php";
require_once "app/views/AutoresView.php";

require_once "app/models/LibrosModel.php";

class AutoresController {

    private $model;
    private $view;
    
    private $authHelper;

    function __construct() {

        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLog();

        $this->model = new AutoresModel();
        $this->view = new AutoresView($this->authHelper->getUsuarioNombre(), $this->authHelper->getUsuarioRol());        
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
            $this->view->showError("El autor al que se quiere ingresar no existe");
        }
    }

    function addAutor() {

        if (isset($_POST["autorInput"])) {

            $nombre = $_POST["autorInput"];
            $id = $this->model->insertAutor($nombre);

            if ($this->model->getAutor($id)) {

                header("Location: ".BASE_URL."autores");
            } else {
                $this->view->showError("No se pudo insertar el autor");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
    
    function deleteAutor($params = null) {

        if ($this->authHelper->getUsuarioRol()) {

            $id = $params[":ID"];
            $autor = $this->model->getAutor($id);

            if ($autor) {

                $this->model->deleteAutor($id);
                header("Location: ".BASE_URL."autores");
            } else {
                $this->view->showError("El autor que se quiere eliminar no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function showAutor($params = null) {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $id = $params[":ID"];
            $autor = $this->model->getAutor($id);

            if ($autor) {
                $this->view->showAutor($autor);
            } else {
                $this->view->showError("El autor al que se quiere ingresar no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function editAutor($params = null) {

        if (isset($_POST["autorEditInput"])) {

            $id = $params[":ID"];
            $nombre = $_POST["autorEditInput"];
            $autor = $this->model->getAutor($id);

            if ($autor) {

                $this->model->editAutor($nombre, $id);
                header("Location: ".BASE_URL."autores");
            } else {
                $this->view->showError("El autor que se quiere editar no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
?>