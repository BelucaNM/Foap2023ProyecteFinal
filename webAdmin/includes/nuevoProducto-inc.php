<?php 
$title="Tienda Productos";
require "../model/Connection.php";
require "../model/Producto.php";
$producto = new Producto();
$categorias = $producto->categorias();

?>