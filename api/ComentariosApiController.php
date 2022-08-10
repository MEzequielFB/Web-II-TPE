<?php
require_once "api/ApiController.php";
require_once "app/models/ComentariosModel.php";
require_once "app/models/LibrosModel.php";

class ComentariosApiController extends ApiController {

    function __construct() {

        parent::__construct();
        $this->model = new ComentariosModel();
    }

    function showComentariosLibro($params = null) {

        $id = $params[":ID"];

        $librosModel = new LibrosModel();
        if ($librosModel->getLibro($id)) {

            $comentarios = $this->model->getComentariosLibro($id);
            $this->view->response($comentarios, 200);
        } else {
            $this->view->response("No existe el libro indicado (id = $id)", 404);
        }
    }

    function addComentarioLibro() {

        $data = $this->getData();

        $id = $this->model->insertComentarioLibro($data->contenido, $data->puntuacion, $data->id_usuario, $data->id_libro);
        $comentario = $this->model->getComentario($id);
        if ($comentario) {
            $this->view->response($comentario, 200);
        } else {
            $this->view->response("No se pudo insertar el comentario", 500);
        }
    }

    function removeComentario($params = null) {

        $id = $params[":ID"];
        $comentario = $this->model->getComentario($id);

        if ($comentario) {

            $this->model->deleteComentario($id);
            $this->view->response($comentario, 200);
        } else {
            $this->view->response("No existe el comentario indicado (id = $id)", 404);
        }
    }

    function showComentariosLibroByPuntuacion($params = null) {

        $id = $params[":ID"];
        $puntuacion = $params[":PUNTUACION"];        

        $librosModel = new LibrosModel();
        $libro = $librosModel->getLibro($id);

        if ($libro) {

            $comentarios = $this->model->getComentariosLibroByPuntuacion($id, $puntuacion);
            $this->view->response($comentarios, 200);
        } else {
            $this->view->response("No existe el libro indicado (id = $id)", 404);
        }
    }
}
?>