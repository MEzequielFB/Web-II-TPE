<?php
require_once "libs/Smarty.class.php";

class UsuariosView {

    private $smarty;

    function __construct() {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
    }

    function showLogin($errorMsj = null) {

        $this->smarty->assign("titulo", "Login");
        $this->smarty->assign("errorMsj", $errorMsj);

        $this->smarty->display("templates/login.tpl");
    }

    function showRegistro($errorMsj = null) {

        $this->smarty->assign("titulo", "Registro");
        $this->smarty->assign("errorMsj", $errorMsj);

        $this->smarty->display("templates/registro.tpl");
    }
}
?>