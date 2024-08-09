<?php 

$title="Tienda Productos";
require "../model/Connection.php";
require "../model/Producto.php";
$producto = new Producto();
$categorias = $producto->categorias();

if (isset ($_GET['id'])){
    $id = $_GET['id'];
    $producto->setId($id);
    $result = $producto->leer();
    $nombre = $descripcion= $URLFoto = $AlTFoto = $categoria = "";
    $precioUnitario = $fecha = $nombreCat = "";

    if ($result) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $URLFoto = $producto->getURLFoto();
        $ALTFoto = $producto->getAlTFoto();
        $categoria = $producto->getCategoria();
        $precioUnitario = $producto->getPrecioUnitario();
        $fecha = $producto->getFecha();
        $nombreCat = $producto->getNombreCategoria();
        $ubicacion = $producto->getUbicacion();
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
    $producto->setUbicacion($_POST['ubicacion']);

    $res = $producto->actualizar();
    echo "respuesta ";
    var_dump($res);
    
    if ($res === true) {
        echo "Producto Actualizado ";
        header("Location: ../view/listadoProductos.php?error=updateDone&sqlError=$res");
        exit();
        
    }else {
        
        echo "Error al actualizar el producto ". $res;
        if ($res === '23000') {
            
            echo "Producto con claves referenciadas ";
            header("Location: ../view/listadoProductos.php?error=updateFailed&sqlError=ProductoClaveReferenciada"); 
            
        } else {
            echo "Error ".$res ;
            header("Location: ../view/listadoProductos.php?error=updateFailed&sqlError=$res");
            
        
        }
        exit(); 
    }
    };

?>