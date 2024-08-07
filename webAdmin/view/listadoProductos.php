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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>
<body>
  <h2><?=$title;?></h2>  
  <table>
    <tr>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>URLFoto</th>
        <th>ALTFoto</th>
        <th>PrecioUnitario</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($todos as $key => $todo){
        echo "<tr>";
        echo "<td>".$todo['pro_categoria']."</td>";
        echo "<td>".$todo['pro_nombre']."</td>";
        echo "<td>".$todo['pro_descripcion']."</td>";
        echo "<td>".$todo['pro_URLFoto']."</td>";
        echo "<td>".$todo['pro_ALTFoto']."</td>";
        echo "<td>".$todo['pro_precioUnitario']."</td>";
        echo "<td>  <a href='../includes/productoEditar.php?id=".$todo['pro_id']."'>Editar</a>|
                    <a href='../includes/productoEliminar.php?id=".$todo['pro_id']."'>Eliminar</a>  
                    </td>";
        echo "</tr>";
        }
        ?>
    </table>
    <a href='nuevoProducto.php' class=""btn-2">Nuevo producto</a>|
</body>
</html>