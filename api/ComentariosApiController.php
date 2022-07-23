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
}
?>