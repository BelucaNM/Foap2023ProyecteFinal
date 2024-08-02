<?php

$lineas =[];
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['id'])) { 


    require "../model/Connection.php";
    require "../model/Pedido.php";
    require "../controler/PedidoContr.php";
    $pedido = new PedidoContr ($_GET['id']); 
    $lineas = $pedido->traerLineas();
    //print_r($lineas);
    $total = 0;
}

?>