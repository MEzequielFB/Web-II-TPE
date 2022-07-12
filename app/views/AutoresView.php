<?php
require_once "libs/Smarty.class.php";

class AutoresView {

    private $smarty;

    function __construct() {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
    }

    function showAutores($autores) {

        $this->smarty->assign("titulo", "Autores");
        $this->smarty->assign("autores", $autores);

        $this->smarty->display("templates/autores.tpl");
    }

    function showAutorLibros($autor, $libros) {

        $this->smarty->assign("titulo", "Libros de $autor->nombre");
        $this->smarty->assign("autor", $autor);
        $this->smarty->assign("libros", $libros);

        $this->smarty->display("templates/autorLibros.tpl");
    }

    function showError($mensaje) {

        $this->smarty->assign("titulo", $mensaje);
        $this->smarty->assign("urlRetorno", "autores");

        $this->smarty->display("templates/error.tpl");
    }
}
?>