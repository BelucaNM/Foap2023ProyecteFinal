<?php

require_once "../model/Connection.php";
require_once "../model/Producto.php";
require_once "../controler/productoContr.php";
$datos = new ProductoContr();
    
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['cat'])) { 

    $categoria = $_GET['cat'];
    $datos->setCategoria($categoria);
    $todos = $datos->traerUnaCategoria();
    $nombreCat = $datos->nombreCategoria();

    // print_r( $nombreCat);
    $title = $title." de Categoría: '".$nombreCat."'";

}else{
    
    $todos = $datos->traerTodos();
//  echo json_encode($todos);
    
};
//print_r($todos);

?>