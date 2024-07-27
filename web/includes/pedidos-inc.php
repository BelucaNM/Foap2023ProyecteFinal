<?php
    
require "../model/Connection.php";
require "../model/Pedido.php";

session_start();

if (!isset ($_SESSION['user'])){
    header("Location: ../index.php");
    echo " No es posible comprar sin estar logeado";
    exit();
}

// Si hay una compra abierta, recupera el número de pedido
if (isset($_SESSION['pedido'])) {
    $pedido = new Pedido($_SESSION['pedido']);

}else{ 
    $pedido = new Pedido(); 
    // Abre un carrito
    $pedido->abrirCarrito();

}
    $pedido->insertarDatos();
    echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/listadoProductos.php';
    </script>";
        
};
?>