<?php
require_once "libs/Smarty.class.php";

class LibrosView {

    private $smarty;

    function __construct() {

        $this->smarty = new Smarty();
        $this->smarty->assign("base_url", define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'));
    }

    function showHome($libros) {

        $this->smarty->assign("titulo", "Home");
        $this->smarty->assign("libros", $libros);

        $this->smarty->display("templates/librosTabla.tpl");
    }
}
?>