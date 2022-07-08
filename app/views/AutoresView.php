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
}
?>