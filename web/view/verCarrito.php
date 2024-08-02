
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
$title="Carrito";
$soy = "carrito";
include "../includes/header.php"; 

if (!isset ($_SESSION['user'])){
        header("Location: ../view/bienvenida.php");
        // " No es posible comprar sin estar identificado";
        exit();
}
include "../includes/verCarrito-inc.php";
?>
<h2>Carrito</h2>
<div id="lineas">
    <h2>Lineas Carrito</h2>  
    <table>
    <tr>
        <th>LineaId</th>
        <th>ProductoId</th>
        <th>ProductoNombre</th>
        <th>Cantidad</th>
        <th>PrecioUnitario</th>
        <th>Subtotal</th>
        
    </tr>
    <?php foreach ($lineas as $key => $linea){
        echo "<tr>";
        echo "<td>".$linea['lincar_id']."</td>";
        echo "<td>".$linea['productos_pro_id']."</td>";
        echo "<td>".$linea['pro_nombre']."</td>";
        echo "<td>".$linea['lincar_cantidad']."</td>";
        echo "<td>".$linea['lincar_precioUnitario']."</td>";
        echo "<td>".$linea['subtotal']."</td>";
        echo "</tr>";
        $total += $linea['subtotal'];

        }
        $carrito->setTotal($total);
    ?>
    </table>
</div>
<div class="cards-container mt-3">
        <div class="card">
        <img src="" alt="" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title"><?="carrito número: ". $carrito->getCarritoId();?></h3>
                        <p class="card-text">fecha:<?=$carrito->getFecha();?></p>
                        <p class="card-text">TOTAL:<?=$carrito->getTotal();?></p>
                        <p class="card-text">Total Lineas:<?=$carrito->getTablaNumReg();?></p>
                        <a href='../includes/pedido-inc.php?id=<?=$carrito->getCarritoId();?>'>Hacer Pedido</a> <br>
                        <a href='../includes/carritoVaciar-inc.php?id=<?=$carrito->getCarritoId();?>'>Vaciar carrito</a>   
                    </div>
        </div>
</div>

<?php /*include "../includes/footer.php";*/ ?> 

</body>
</html>