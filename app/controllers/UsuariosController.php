<?php
require_once "app/models/UsuariosModel.php";
require_once "app/views/UsuariosView.php";
require_once "app/helpers/AuthHelper.php";

class UsuariosController {
    
    private $model;
    private $view;

    private $authHelper;

    function __construct() {

        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();

        $this->authHelper = new AuthHelper();
    }

    function showLogin() {
        $this->view->showLogin();
    }

    function verifyUser() {

        if (isset($_POST["nombreUsuarioInput"]) && isset($_POST["passwordInput"])) {

            $nombreUsuario = $_POST["nombreUsuarioInput"];
            $password = $_POST["passwordInput"];

            $usuario = $this->model->getUsuario($nombreUsuario);
            if ($usuario && $password == $usuario->password) {

                $this->authHelper->login($usuario->id, $usuario->nombre, $usuario->rol);
                header("Location: ".BASE_URL);
            } else {                
                $this->view->showLogin("Usuario o contraseña incorrectos");
            }
        }
    }

    function logout() {
        $this->authHelper->logout();
        header("Location: ".BASE_URL."login");
    }
}
?>