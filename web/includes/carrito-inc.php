<?php
    
require "../model/Connection.php";
require "../model/Carrito.php";

session_start();
if (isset ($_GET['id'])){

    $id = $_GET['id'];

    print_r($_SESSION);

    if (!isset ($_SESSION['user'])){
        header("Location: ../view/productosExistencias.php?id=$id&error='noLogged'");
        // " No es posible comprar sin estar identificado";
        exit();
    }

// Si hay una compra abierta, recupera el número de carrito


    $carrito = new Carrito ("","",$_SESSION['userId']); // inicializa un carrito para el usuario
    $result = $carrito->recuperaCarrito();
    if (!$result) {
            $carritoId = $carrito->crearCarrito();
            $_SESSION['carrito'] = $carritoId;
    };
   
// recupera precio del producto    
    require "../model/producto.php";
    $producto = new producto($id);
    $producto->leer();
    $precio= $producto->getPrecioUnitario();

    echo "precio =".$precio;
        
    if (!$precio) {
            echo " se ha producido un error."; exit();}
    
    $carrito->setPrecioUnitario($precio);
    $carrito->setCantidad(1);
    $carrito->setProductoId($id);
    $carrito->añadirAlCarrito();
    
    $producto->actualizarExistencias();

    
    echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/listadoProductos.php?info='carro'; // vuelve a comprar
    </script>";
        
    exit();
}
?>