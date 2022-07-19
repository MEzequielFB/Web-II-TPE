<?php
class AuthHelper {

    function __construct() {

        session_start();
    }

    function login($id, $usuario, $rol) {

        $_SESSION["ID"] = $id;
        $_SESSION["USUARIO"] = $usuario;
        $_SESSION["ROL"] = $rol;
    }

    function logout() {        
        session_destroy();
    }

    function checkLog() {

        if (!isset($_SESSION["USUARIO"])) {

            header("Location: ".BASE_URL."login");
        }
    }

    function getUsuarioNombre() {

        if (isset($_SESSION["USUARIO"])) {
            return $_SESSION["USUARIO"];
        }
    }

    function getUsuarioRol() {

        if (isset($_SESSION["USUARIO"])) {
            return $_SESSION["ROL"];
        }
    }
}
?>