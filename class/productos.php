<?php
/* @autor Michael Belmar */

class Productos {
    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $categoria_id;

    // Métodos SET
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setImagen($imagen) { $this->imagen = $imagen; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setCategoriaId($categoria_id) { $this->categoria_id = $categoria_id; }

    // Método GUARDAR
    public function guardar() {
        require_once 'database.php';
        $db = new Database();

        // Verificar si ya existe el producto
        $sql_check = "SELECT * FROM productos WHERE id = $this->id";
        $resultado = $db->select($sql_check);

        if (count($resultado) > 0) {
            // UPDATE
            $sql = "UPDATE productos SET 
                        nombre = '$this->nombre',
                        imagen = '$this->imagen',
                        descripcion = '$this->descripcion',
                        precio = $this->precio,
                        categoria_id = $this->categoria_id
                    WHERE id = $this->id";
            return $db->update($sql);
        } else {
            // INSERT
            $sql = "INSERT INTO productos 
                        (id, nombre, imagen, descripcion, precio, categoria_id)
                    VALUES 
                        ($this->id, '$this->nombre', '$this->imagen', '$this->descripcion', $this->precio, $this->categoria_id)";
            return $db->insert($sql);
        }
    }

    // Método ELIMINAR
    public function eliminar() {
        require_once 'database.php';
        $db = new Database();
        $sql = "DELETE FROM productos WHERE id = $this->id";
        return $db->delete($sql);
    }
}
