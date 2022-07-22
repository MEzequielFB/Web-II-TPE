<?php
require_once "api/ApiController.php";
require_once "app/models/ComentariosModel.php";

class ComentariosApiController extends ApiController {

    function __construct() {

        $this->model = new ComentariosModel();
    }

    
}
?>