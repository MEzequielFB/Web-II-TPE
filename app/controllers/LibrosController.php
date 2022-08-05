<?php
require_once "app/models/LibrosModel.php";
require_once "app/views/LibrosView.php";

require_once "app/models/AutoresModel.php";

class LibrosController {

    private $model;
    private $view;

    private $authHelper;

    function __construct() {

        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLog();

        $this->model = new LibrosModel();
        $this->view = new LibrosView($this->authHelper->getUsuarioNombre(), $this->authHelper->getUsuarioRol());
    }

    function showHome($params = null) { //El parámetro es el número de página

        if ($params == null) { //La variable pagina sirve para calcular el OFFSET en la consulta SELECT de los libros
            $pagina = 1;
        } else {
            $pagina = $params[":PAGE"];
        }

        $offset = ($pagina-1) * 5;
        if ($offset < 0) { //Si offset es menor a 0 se envía al usuario a la primera página ya que el servidor da error al ser un número negativo. No se puede tener un offset menor a 0 en la consulta
            header("Location: ".BASE_URL);
        }

        $autoresModel = new AutoresModel();
        $autores = $autoresModel->getAutores();

        $libros = $this->model->getLibros($offset);
        $cantLibros = count($libros);

        $this->view->showHome($libros, $autores, $pagina, $cantLibros); //Se pasa por parámetro la página y la cantidad de libros para deshabilitar los botones de paginación
    }

    function showLibro($params = null) {

        $autoresModel = new AutoresModel();
        $autores = $autoresModel->getAutores();

        $id = $params[":ID"];
        $libro = $this->model->getLibro($id);
        
        if ($libro) {
            $this->view->showLibro($libro, $autores, $this->authHelper->getUsuarioId());
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

            //Si se envío una imágen a través del form y su extensión es válida ...
            if (isset($_FILES["imagenInput"]) && ($_FILES["imagenInput"]["type"] == "image/jpg" || $_FILES["imagenInput"]["type"] == "image/jpeg" || $_FILES["imagenInput"]["type"] == "image/png")) {

                $img = $_FILES["imagenInput"]["tmp_name"]; //Nombre temporal del archivo
                $path = $this->uploadImage($img); //Se obtiene el path donde está guardado el archivo

                $id = $this->model->insertLibro($titulo, $autor, $genero, $fecha, $path); //Se inserta el libro junto con el path de la imágen
            } else {

                $id = $this->model->insertLibro($titulo, $autor, $genero, $fecha); //Se inserta el libro sin una imágen adjunta
            }
            
            if ($this->model->getLibro($id)) {

                header("Location: ".BASE_URL);
            } else {                
                $this->view->showError("No se pudo ingresar el nuevo libro");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function deleteLibro($params = null) {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $id = $params[":ID"];
            if ($this->model->getLibro($id)) {

                $this->model->deleteLibro($id);
                header("Location: ".BASE_URL);
            } else {
                $this->view->showError("El libro que se quiere eliminar no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function editLibro($params = null) {        

        if (isset($_POST["tituloInput"]) && isset($_POST["generoInput"]) && isset($_POST["autorSelect"]) && isset($_POST["fechaInput"])) {

            $titulo = $_POST["tituloInput"];
            $autor = intval($_POST["autorSelect"]);
            $genero = $_POST["generoInput"];            
            $fecha = $_POST["fechaInput"];

            $id = $params[":ID"]; //Se obtiene el ID de la URL
            if ($this->model->getLibro($id)) { //Si el libro con el ID obtenido existe ...

                if ($_FILES["imagenInput"] && ($_FILES["imagenInput"]["type"] == "image/jpg" || $_FILES["imagenInput"]["type"] == "image/jpeg" || $_FILES["imagenInput"]["type"] == "image/png")) {

                    $img = $_FILES["imagenInput"]["tmp_name"];
                    $path = $this->uploadImage($img);

                    $this->model->editLibro($titulo, $autor, $genero, $fecha, $id, $path); //Se pone el path siempre al final porque sino me da error de tokens
                } else {
                    
                    $this->model->editLibro($titulo, $autor, $genero, $fecha, $id);
                }                
                header("Location: ".BASE_URL."libros/$id");
            } else {
                $this->view->showError("El libro que se quiere editar no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    private function uploadImage($img) {

        $target = "img/librosImg/".uniqid().".jpg"; //Se define el path donde se va a guardar el archivo y se le da un ID por si existen archivos con el mismo nombre
        move_uploaded_file($img, $target); //Se guarda el archivo en el path definido

        return $target; //Se devuelve el path para insertarlo en la base de datos
    }

    function deleteImgLibro($params = null) {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $id = $params[":ID"];
            if ($this->model->getLibro($id)) {

                $this->model->deleteImg($id);
                header("Location: ".BASE_URL."libros/$id");
            } else {
                $this->view->showError("El libro que se quiere manipular no existe");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
?>