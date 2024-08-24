<?php 

require "../model/connection.php";
require "../model/producto.php";
require_once "../controler/ProductoContr.php";
$producto = new ProductoContr();

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $producto->setId($id);
    $nombre = $descripcion= $URLFoto = $AlTFoto = $categoria = "";
    $precioUnitario = $fecha = $nombreCat = "";

    $id = $_GET['id'];
    $producto->setId($id);
    $result = $producto->leer();
    // var_dump($result);
    if ($result) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $URLFoto = $producto->getURLFoto();
        $ALTFoto = $producto->getAlTFoto();
        $categoria = $producto->getCategoria();
        $precioUnitario = $producto->getPrecioUnitario();
        $fecha = $producto->getFecha();
        $nombreCat = $producto->nombreCategoria();
        $existencias = $producto->leerExistencias(); 
        }

    };

if (isset($_POST['actualizar'])){
    print_r ($_POST);
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setPrecioUnitario($_POST['precioUnitario']);
    $producto->setURLFoto($_POST['URLFoto']);
    $producto->setALTFoto($_POST['ALTFoto']);
    $producto->setCategoria($_POST['categoria']);

    $producto->actualizar();

    
        
    }

?>