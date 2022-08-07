<?php
require_once "libs/Smarty.class.php";

class LibrosView {

    private $smarty;

    function __construct($nombreUsuario, $rolUsuario) {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);

        $this->smarty->assign("nombreUsuario", $nombreUsuario);
        $this->smarty->assign("rolUsuario", $rolUsuario);
    }

    function showHome($libros, $autores, $pagina, $cantLibrosSigPagina, $cantPaginas, $url, $urlP2 = null) {

        $this->smarty->assign("titulo", "Home");
        $this->smarty->assign("libros", $libros);
        $this->smarty->assign("autores", $autores);
        $this->smarty->assign("pagina", $pagina);
        $this->smarty->assign("cantLibrosSigPagina", $cantLibrosSigPagina);
        $this->smarty->assign("cantPaginas", $cantPaginas);
        $this->smarty->assign("url", $url);
        $urlP2 != null ? $this->smarty->assign("urlP2", $urlP2) : $this->smarty->assign("urlP2", "");

        $this->smarty->display("templates/libros.tpl");
    }

    function showLibro($libro, $autores, $idUsuario) {

        $this->smarty->assign("titulo", "$libro->titulo");
        $this->smarty->assign("libro", $libro);
        $this->smarty->assign("autores", $autores);
        $this->smarty->assign("idUsuario", $idUsuario);

        $this->smarty->display("templates/libro.tpl");
    }

    function showError($mensaje) {

        $this->smarty->assign("titulo", $mensaje);
        $this->smarty->assign("urlRetorno", BASE_URL);
        
        $this->smarty->display("templates/error.tpl");
    }
}
?>