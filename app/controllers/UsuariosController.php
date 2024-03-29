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

            $usuario = $this->model->getUsuarioByNombre($nombreUsuario);
            if (password_verify($password, $usuario->password)) {

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

    function showRegistro() {
        $this->view->showRegistro();
    }

    function registrarUsuario() {

        if (isset($_POST["nombreUsuarioInput"]) && isset($_POST["passwordInput"]) && isset($_POST["passwordRepeatInput"])) {

            $nombreUsuario = $_POST["nombreUsuarioInput"];
            $password = $_POST["passwordInput"];
            $passwordR = $_POST["passwordRepeatInput"];

            if (!$this->model->getUsuarioByNombre($nombreUsuario)) {

                if ($password == $passwordR) {

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $idUsuario = $this->model->insertUsuario($nombreUsuario, $passwordHash, 0);

                    $usuario = $this->model->getUsuario($idUsuario);

                    if ($usuario) {

                        $this->authHelper->login($usuario->id, $usuario->nombre, $usuario->rol);
                        header("Location: ".BASE_URL);
                    } else {
                        $this->view->showRegistro("No se pudo realizar el registro");
                    }
                } else {
                    $this->view->showRegistro("Las contraseñas no coinciden");    
                }
            } else {
                $this->view->showRegistro("El nombre de usuario ingresado ya existe");
            }
        }
    }

    function showUsuarios() {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $usuarios = $this->model->getUsuarios();
            foreach ($usuarios as $usuario) {
                if ($usuario->rol == 1) {
                    $usuario->rol = "Administrador";
                } else {
                    $usuario->rol = "Usuario";
                }
            }
            $this->view->showUsuarios($usuarios, $this->authHelper->getUsuarioNombre(), $this->authHelper->getUsuarioRol());
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function editPermisos($params = null) {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $id = $params[":ID"];
            $usuario = $this->model->getUsuario($id);

            if ($usuario && $usuario->nombre != $this->authHelper->getUsuarioNombre()) {
                
                if ($usuario->rol == 1) {
                    $this->model->editPermisos(0, $id);
                } else {
                    $this->model->editPermisos(1, $id);
                }
                header("Location: ".BASE_URL."usuarios");
            } else {
                $this->view->showError("El usuario al que se quiere acceder no existe o no es modificable");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    function deleteUsuario($params = null) {

        if ($this->authHelper->getUsuarioRol() == 1) {

            $id = $params[":ID"];
            $usuario = $this->model->getUsuario($id);

            if ($usuario && $usuario->nombre != $this->authHelper->getUsuarioNombre()) {

                $this->model->deleteUsuario($id);
                header("Location: ".BASE_URL."usuarios");
            } else {
                $this->view->showError("El usuario al que se quiere acceder no existe o no es modificable");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }
}
?>