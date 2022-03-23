<?php
include_once '../modelo/Producto.php';

$producto = new Producto();
if ($_POST['funcion'] == "listar") {
    $producto->mostrar();
    $json = array();
    foreach ($producto->productos as $data) {
        $json['data'][]=$data;

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=="agregar"){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $producto->agregar($nombre,$descripcion,$precio,$stock);
 }

if($_POST['funcion']=="editar"){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $producto->editar($id,$nombre,$descripcion,$precio,$stock);
    
 }
 if($_POST['funcion']=="eliminar"){
     $id = $_POST['id'];
     $producto->eliminar($id);
  }
 