<?php
include_once 'conexion.php';

class Producto{
    var $productos;
    public function __construct(){
        $this->acceso = Conexion::conectar();
    }

    function mostrar(){
        $sql = "SELECT id,nombre,descripcion,precio,stock FROM productos WHERE activo=1";
        $resultado = $this->acceso->query($sql); //pasando consultas
        $this->productos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $this->productos;
    }
    function agregar($nombre,$descripcion,$precio,$stock){
        $sql="INSERT INTO productos (nombre,descripcion,precio,stock) VALUES ('$nombre','$descripcion','$precio','$stock')";
        $resultado = $this->acceso->query($sql);
    }
    function editar($id,$nombre,$descripcion,$precio,$stock){
        $sql="UPDATE productos SET nombre='$nombre',descripcion='$descripcion',precio='$precio',stock='$stock' where id='$id'";
        $resultado = $this->acceso->query($sql);
    }
    function eliminar($id){
        // $sql="DELETE FROM productos where id='$id'";
        $sql="UPDATE productos SET activo='0' where id='$id'";
        $resultado = $this->acceso->query($sql);
    }

}
