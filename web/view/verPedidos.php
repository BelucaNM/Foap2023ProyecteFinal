<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    header("Location: ../view/bienvenidaCarousel.php");
    // " No es posible ver pedidos sin estar identificado";
    exit();
} 
include "../includes/verPedidos-inc.php"; 

?>
<section id="cuerpoPagina" class="section">
    <table class = 'table table-striped' id="tPedidos">
        <thead>
            <tr>
                <th scope="col">PedidoId</th>
                <th scope="col">PedidoFecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $uno){
                echo "<tr>";
                echo "<td scope= 'row'>".$uno['ped_id']."</td>";
                echo "<td>".$uno['ped_fecha']."</td>";
                echo "<td><a href='verPedido.php?id=".$uno['ped_id']."'>Ver Detalle</a>";
                echo " / <a href='albaranPDF.php?numcomanda=".$uno['ped_id']."'>Imprimir Albaran</a></td>";
                echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</section>

<?php include "../includes/footer.php"; ?> 

</body>
</html>