<?php 
require "../model/Connection.php";
require "../model/Tienda.php";
require "../controler/tiendaContr.php";
$tienda = new TiendaContr();

$todos = $tienda->leerTodos();


?>