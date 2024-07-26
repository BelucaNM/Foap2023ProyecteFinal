<?php

print_r($_POST);
if (isset($_POST['submit'])) {
    
require "../model/connection.php";
require "../model/producto.php";

$producto = new Producto('',$_POST['nombre'],$_POST['descripcion'],$_POST['precio'],$_POST['URLFoto'],$_POST['ALTFoto'],$_POST['categoria']);

$producto->insertarDatos();

echo "<script>  alert('Datos guardados correctamente');
                document.location='../view/listadoProductos.php';
    </script>";
        
};
?>