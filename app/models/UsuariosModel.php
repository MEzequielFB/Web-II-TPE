<?php
class UsuariosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');        
    }

    function getUsuario($nombre) {

        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre LIKE CONCAT('%',?,'%')");
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>