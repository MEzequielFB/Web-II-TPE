<?php
require_once "libs/Smarty.class.php";

class AutoresView {

    private $smarty;

    function __construct($nombreUsuario, $rolUsuario) {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);

        $this->smarty->assign("nombreUsuario", $nombreUsuario);
        $this->smarty->assign("rolUsuario", $rolUsuario);
    }

    function showAutores($autores) {

        $this->smarty->assign("titulo", "Autores");
        $this->smarty->assign("autores", $autores);

        $this->smarty->display("templates/autores.tpl");
    }

    function showAutor($autor) {

        $this->smarty->assign("titulo", $autor->nombre);
        $this->smarty->assign("autor", $autor);

        $this->smarty->display("templates/autor.tpl");
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