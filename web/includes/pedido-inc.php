<?php

session_start();

print_r($_SESSION);

if (!isset ($_SESSION['user'])){
            header("Location: ../view/bienvenido.php?error='noLogged'");
            // " No es posible comprar sin estar identificado";
            exit();
        }
require "../model/Connection.php";
require "../model/Carrito.php";
require "../model/Pedido.php";


if (isset ($_GET['id'])){

    $id = $_GET['id']; // identificador del carrito
    $carrito = new Carrito ($id,"",$_SESSION['userId']); // comprueba datos correctos

    $result = $carrito->compruebaUserCarrito();
    if (!$result) {
        header("Location: ../view/bienvenida.php?error='internalError'");
        echo " El carrito no corresponde al user";
        exit();
    };

    
// crea un pedido 
    $pedido = new Pedido("","",$_SESSION['userId']);
    
    $pedidoid = $pedido->crearPedido(); // guarda el pedidoid creado en la variable $this->pedidoid
    echo "devuelve ".$pedidoid;

    $lineas = $carrito->traerLineas();
    foreach ($lineas as $linea) {
    
        $pedido->setproductoid($linea['productos_pro_id']);
        $pedido->setcantidad($linea['lincar_cantidad']);
        $pedido->setPrecioUnitario($linea['lincar_precioUnitario']);
        $pedido->insertarLinea();
        };
    
// borrar carrito
 //   $carrito->borrarCarrito();
// actualizar existencias

/*
// vuelve a comprar 
    echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/listadoProductos.php?info=carro'; 
    </script>";
        
    exit();
*/
}

?>