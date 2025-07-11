<?php
/* @autor Michael Belmar */

class Categorias {
    private $id;
    private $nombre;

    // Métodos SET
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método GUARDAR
    public function guardar() {
        require_once 'database.php';
        $db = new Database();

        // Primero verificamos si ya existe la categoría
        $sql_check = "SELECT * FROM categorias WHERE id = $this->id";
        $resultado = $db->select($sql_check);

        if (count($resultado) > 0) {
            // Ya existe, hacer UPDATE
            $sql = "UPDATE categorias SET nombre = '$this->nombre' WHERE id = $this->id";
            return $db->update($sql);
        } else {
            // No existe, hacer INSERT
            $sql = "INSERT INTO categorias (id, nombre) VALUES ($this->id, '$this->nombre')";
            return $db->insert($sql);
        }
    }

    // Método ELIMINAR
    public function eliminar() {
        require_once 'database.php';
        $db = new Database();

        $sql = "DELETE FROM categorias WHERE id = $this->id";
        return $db->delete($sql);
    }
}
