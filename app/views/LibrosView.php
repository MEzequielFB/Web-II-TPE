<?php
require_once "libs/Smarty.class.php";

class LibrosView {

    private $smarty;

    function __construct() {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", BASE_URL);
    }

    function showHome($libros, $autores) {

        $this->smarty->assign("titulo", "Home");
        $this->smarty->assign("libros", $libros);
        $this->smarty->assign("autores", $autores);
        $this->smarty->assign("selectForm", true); //Una variable que si es declarada se añade un tag script al head de la página        

        $this->smarty->display("templates/libros.tpl");
    }

    function showLibro($libro) {

        $this->smarty->assign("titulo", "LibroInfo");
        $this->smarty->assign("libro", $libro);

        $this->smarty->display("templates/libro.tpl");
    }
}
?>