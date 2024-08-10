<?php
// recupera el número de carrito para el user
require "../model/Connection.php";
require "../model/Carrito.php";
require "../controler/carritoContr.php";
$carrito = new CarritoContr ("","",$_SESSION['userId']); 
$result = $carrito->recuperaCarrito();

if ($result) {
    $lineas=$carrito->traerLineas();
    $total=0;
}else{
    echo " El carrito esta vacio.";
    header("Location: ../view/bienvenida.php?error=EmptyCart");
    exit();
}
?>
