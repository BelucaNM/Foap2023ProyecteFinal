
<?php

if (!isset ($_GET['id'])) { exit(); }; // error, no se identifica el artículo

// " No es posible comprar sin estar identificado";
session_start();
print_r($_SESSION);
if (!isset ($_SESSION['user'])){
    header("Location: ../view/productosExistencias.php?id=$id&error=noLogged");
    exit();
}

// Si hay una compra abierta, recupera el número de carrito
    
require "../model/Connection.php";
require "../model/Carrito.php";
require "../controler/carritoContr.php";

$userId = $_SESSION["userId"];
$carrito = new CarritoContr ("","",$userId); // inicializa un carrito para el usuario
$result = $carrito->recuperaCarrito();
if (!$result) {
    $carrito->crearCarrito();
    echo " identificador del carrito"; 
    var_dump ($carrito->getCarritoId());
    $_SESSION['carrito'] = $carrito->getCarritoId();
    };
   
// recupera precio del producto    
require "../model/Producto.php";
require "../controler/productoContr.php";

$idProd = $_GET['id']; // identificador del producto
$producto = new ProductoContr($idProd);
$producto->leer();
$precio= $producto->getPrecioUnitario();
echo "precio =".$precio;
        
if ((!$precio) || ($precio<=0)) {
        header("Location: ../view/verProductoExistencias.php?error=noPrecio");
        exit();}
    
$carrito->setPrecioUnitario($precio);
$carrito->setCantidad(1);
$carrito->setProductoId($idProd);
$carrito->añadirAlCarrito();
   
?>