<?php
    
require "../model/Connection.php";
require "../model/Carrito.php";
require "../controler/CarritoContr.php";

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

    $carrito = new CarritoContr ("","",$_SESSION['userId']); // inicializa un carrito para el usuario
    $result = $carrito->recuperaCarrito();
    if (!$result) {
            $carrito->crearCarrito();
            echo " identificor del carrito"; 
            var_dump ($carrito->carritoid);
            $_SESSION['carrito'] = $carrito->carritoid;
    };
   
// recupera precio del producto    
    require "../model/producto.php";
    require "../controler/productoContr.php";
    $producto = new ProductoContr($id);
    $producto->leer();
    $precio= $producto->getPrecioUnitario();

    echo "precio =".$precio;
        
    if (!$precio) {
            echo " se ha producido un error."; exit();}
    
    $carrito->setPrecioUnitario($precio);
    $carrito->setCantidad(1);
    $carrito->setProductoId($id);
    $carrito->añadirAlCarrito();
    
    // vuelve a comprar
 /*   echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/verProductos.php?info=carro'; 
    </script>";
 */       
    exit();
}
?>