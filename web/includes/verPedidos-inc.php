<?php
require "../model/Connection.php";
require "../model/Pedido.php";
require "../controler/PedidoContr.php";
$pedido = new PedidoContr ("","",$_SESSION['userId']); 
$result = $pedido->traerTodos();
//var_dump ($result);
if (!$result) {
    echo " El usuario no tiene pedidos";
    header("Location: ../view/bienvenidaCarousel.php?error=noOrders");
    exit();
}
$lineas = [];
?>