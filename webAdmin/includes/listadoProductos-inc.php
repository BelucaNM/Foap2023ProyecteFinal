<?php

require_once ("../model/Connection.php");
require_once ("../model/Producto.php");
$datos = new Producto();

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['cat'])) { 

    $categoria = $_GET['cat'];
    $datos->setCategoria($categoria);
    $todos = $datos->traerUnaCategoria();
    $nombreCat = $datos->getNombreCategoria();
    print_r( $nombreCat);
    $title = "Lista de productos de Categoría '".$nombreCat."'";
}else{
    $todos = $datos->traerTodos();
    $title = "Lista de productos";
};
//print_r($todos);
?>