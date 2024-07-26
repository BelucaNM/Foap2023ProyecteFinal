<?php
require_once ("../model/Connection.php");
require_once ("../model/Producto.php");

$record = new Producto();

if (isset($_GET['id'])){
    $record->setId($_GET['id']);
    $record->eliminar();

    echo "<script>  alert('Datos borrados');
                document.location='../view/listadoProductos.php';
    </script>";

}
?>
