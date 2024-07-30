<?php

require_once ("../model/Connection.php");
require_once ("../model/Producto.php");
$datos = new Producto();

if ( isset($_GET['info']) && $_GET['info'] == 'carro') {
    echo '<div class="alert alert-success" role="alert">Su artículo ha sido incorporado al carro. Por favor, RECUERDE, que la reserva solo se hace cuando confirme el pedido.</div>';
    };
if ( isset($_GET['info']) && $_GET['info'] == 'deliver') {
    echo '<div class="alert alert-success" role="alert">Su pedido ha sido realizado</div>';
    };

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['cat'])) { 

    $categoria = $_GET['cat'];
    $datos->setCategoria($categoria);
    $todos = $datos->traerUnaCategoria();
    $nombreCat = $datos->getNombreCategoria();
    // print_r( $nombreCat);
    $title = "Lista de productos de Categoría '".$nombreCat."'";
}else{
    $todos = $datos->traerTodos();
    $title = "Lista de productos";
};
//print_r($todos);

$soy = "productos";
include "../includes/header.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h2><?=$title;?></h2>  
  <table>
    <tr>
        <th>ProductoId</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>URLFoto</th>
        <th>ALTFoto</th>
        <th>PrecioUnitario</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($todos as $key => $todo){
        echo "<tr>";
        echo "<td>".$todo['pro_id']."</td>";
        echo "<td>".$todo['pro_nombre']."</td>";
        echo "<td>".$todo['pro_descripcion']."</td>";
        echo "<td>".$todo['pro_URLFoto']."</td>";
        echo "<td>".$todo['pro_ALTFoto']."</td>";
        echo "<td>".$todo['pro_precioUnitario']."</td>";
        echo "<td>  <a href='../view/verProductoExistencias.php?id=".$todo['pro_id']."'>Ver</a> </td>";
        echo "</tr>";
        }
        ?>
    </table>
    <!-- Las opciones siguientes solo estan en la version de la APP para los vendedores
    <a href='../includes/productoEditar.php?id=".$todo['pro_id']."'>Editar</a>|
    <a href='../includes/productoEliminar.php?id=".$todo['pro_id']."'>Eliminar</a>| 
    <a href='nuevoProducto.php' class=""btn-2">Nuevo producto</a>| -->
</body>
</html>