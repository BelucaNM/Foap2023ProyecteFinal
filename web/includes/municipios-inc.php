<?php
//echo 'Creando instancia de tabla de Pedidos <br>';
require "../model/connection.php";
require "../model/municipio.php";

$municipio = new municipio();
$todos= $municipio->getTodos();

if ($todos == 1 ) { // error STMT
        echo "Error al obtener todos los municipios <br>";
        $num=0;
    };
?>