<?php 
require "../model/connection.php";
require "../model/tienda.php";
require "../controler/tiendaContr.php";
$tienda = new TiendaContr();

$todos = $tienda->leerTodos();


?>