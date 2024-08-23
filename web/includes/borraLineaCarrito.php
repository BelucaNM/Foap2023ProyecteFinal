<?php
header("Content-type: application/json; charset=utf-8");
$_POST=json_decode(file_get_contents('php://input'), true);

echo ($_POST);

$id = $_POST['id'];
require "../model/Connection.php";
require "../model/Carrito.php";
require "../controler/carritoContr.php";
$carrito = new CarritoContr (); 
$carrito->setLineaid($id);
$result = $carrito->borrarLineaCarrito();
   
?>
