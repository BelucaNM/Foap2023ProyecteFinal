<?php 
require "../model/connection.php";
require "../model/tienda.php";
$tienda = new Tienda();

$todos = $tienda->getTodos();

$title="Listado de tiendas";
$soy = "tiendas";
include "../includes/header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="tiendas">
<h2>Tiendas</h2>

<table>
    
    <tr>
        <th>Tienda</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Responsable</th>
        <th>Acciones</th>
        
    
    </tr>
    <?php foreach ($todos as $key => $todo){
        echo "<tr>";
        echo "<td>".$todo['tie_id']."</td>";
        echo "<td>".$todo['tie_nombre']."</td>";
        echo "<td>".$todo['tie_direccion']."</td>";
        echo "<td>".$todo['tie_telefono']."</td>";
        echo "<td>  <a href='../view/verDetallesTienda.php?id=".$todo['tie_id']."'>Ver</a></td>";
        echo "</tr>";
        }
        ?>
    </table>
</div>    


<?php /*include "../includes/footer.php";*/ ?> 

</body>
</html>