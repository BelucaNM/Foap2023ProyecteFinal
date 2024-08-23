<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php 
$title="Pedido";
$soy = "pedido";
include "../includes/header.php";
include "../includes/verPedido-inc.php"
?>
<section id="cuerpoPagina" class="section">
     
    <table class = 'table table-striped' id="tlineasPedido">
        <thead>
            <tr>
                <th scope="col">Linea#</th>
                <th scope="col">ProductoId</th>
                <th scope="col">ProductoNombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">PrecioUnitario</th>
                <th scope="col">Subtotal</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineas as $key => $linea){
                echo "<tr>";
                echo "<td scope= 'row'>".$linea['lin_id']."</td>";
                echo "<td>".$linea['productos_pro_id']."</td>";
                echo "<td>".$linea['pro_nombre']."</td>";
                echo "<td>".$linea['lin_cantidad']."</td>";
                echo "<td>".$linea['lin_importe']."</td>";
                echo "<td>".$linea['subtotal']."</td>";
                echo "</tr>";
                $total += $linea['subtotal'];

                }
                echo "<tr>";
                echo "<td> Total = ".$total."</td>";
                echo "</tr>";
                
                
            ?>
        </tbody>
    </table>
    
</section>
<?php include "../includes/footer.php"; ?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>