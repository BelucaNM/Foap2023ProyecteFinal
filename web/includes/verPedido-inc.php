<?php

$lineas =[];
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['id'])) { 


    require "../model/Connection.php";
    require "../model/Pedido.php";
    require "../controler/pedidoContr.php";
    $pedido = new PedidoContr ($_GET['id']); 
    $lineas = $pedido->traerLineas();
    //print_r($lineas);
    $total = 0;
}

?>