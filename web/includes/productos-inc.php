<?php

//instanciar las classes
//require "autoload.models.php";
//require "autoload.controlers.php";

//echo 'Creando instancia de tabla de Pedidos <br>';
require "../model/Connection.php";
require "../model/Producto.php";
require "../controler/productoContr.php";

$producto = new ProductoContr();
$todos= $producto->getTodos();

if ($todos == 1 ) { // error STMT
        echo "Error al obtener todos los productos <br>";
        $num=0;
    };
?>