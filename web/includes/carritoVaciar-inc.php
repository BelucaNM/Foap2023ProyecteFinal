<?php 
if (isset ($_GET['id'])){
    
// recupera el número de carrito para el user
require "../model/Connection.php";
require "../model/Carrito.php";
$carrito = new Carrito ($_GET['id']); 
$result = $carrito->eliminarCarrito();

if ($result) {
    echo "El carrito se ha eliminado correctamente";
    header("Location: ../view/bienvenida.php?error='none'");
}else{
    echo $result;
    header("Location: ../view/bienvenida.php?error='FailedDelete'");
}


?>