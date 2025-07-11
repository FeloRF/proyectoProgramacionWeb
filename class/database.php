<?php
/* @autor Michael Belmar */

class Database {
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "MIPROYECTO");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        // Opcional: establecer charset en UTF-8
        $this->conexion->set_charset("utf8");
    }

    public function insert($sql) {
        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error al insertar: " . $this->conexion->error;
            return false;
        }
    }

    public function update($sql) {
        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error al actualizar: " . $this->conexion->error;
            return false;
        }
    }

    public function delete($sql) {
        if ($this->conexion->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error al eliminar: " . $this->conexion->error;
            return false;
        }
    }

    public function select($sql) {
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error al seleccionar: " . $this->conexion->error;
            return [];
        }
    }

    public function __destruct() {
        $this->conexion->close();
    }
}
