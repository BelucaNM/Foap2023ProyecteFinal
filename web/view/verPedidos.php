
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

<?php 
$title="Pedidos";
$soy = "mispedidos";
include "../includes/header.php"; 


if (!isset ($_SESSION['user'])){
        header("Location: ../view/bienvenida.php");
        // " No es posible ver pedidos sin estar identificado";
        exit();
}
    
// recupera el número de carrito para el user
require "../model/Connection.php";
require "../model/Pedido.php";
$pedido = new pedido ("","",$_SESSION['userId']); 
$todos = $pedido->traerTodos();

if (!$result) {
    echo " El usuario no tiene pedidos";
    header("Location: ../view/bienvenida.php?error=noOrders");
    exit();
}
?>

<div id="pedidos">
    <h2>Sus Pedidos</h2>  
    <table>
    <tr>
        <th>PedidoId</th>
        <th>PedidoFecha</th>
        <th>Acciones</th>
        
    </tr>
    <?php foreach ($todos as $key => $uno){
        echo "<tr>";
        echo "<td>".$uno['ped_id']."</td>";
        echo "<td>".$uno['ped_fecha']."</td>";
        echo "<td><a href='verPedido.php?ped_id=".$uno['ped_id']."'class='btn btn-primary'>Ver Pedido</a></td>";
        echo "</tr>";

        }

    ?>
    </table>
</div>

<?php /*include "../includes/footer.php";*/ ?> 

</body>
</html>