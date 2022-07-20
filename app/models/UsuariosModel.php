<?php
class UsuariosModel {

    private $db;

    function __construct() {

        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');        
    }

    function getUsuario($id) {

        $query = $this->db->prepare("SELECT * FROM usuario WHERE id = ?");
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUsuarioByNombre($nombre) {

        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre LIKE CONCAT('%',?,'%')");
        $query->execute([$nombre]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertUsuario($nombreUsuario, $passwordHash, $rol) {

        $query = $this->db->prepare("INSERT INTO usuario(nombre, password, rol) VALUES(?,?,?)");
        $query->execute([$nombreUsuario, $passwordHash, $rol]);        

        return $this->db->lastInsertId();
    }

    function getUsuarios() {

        $query = $this->db->prepare("SELECT * FROM usuario");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function editPermisos($rol, $id) {

        $query = $this->db->prepare("UPDATE usuario SET rol = ? WHERE id = ?");
        $query->execute([$rol, $id]);
    }
}
?>