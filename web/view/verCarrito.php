
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
<section id="cuerpoPagina" class="section">
<div class="cards-container mt-3">
        <table class="table table-striped" id="carrito">
        <thead>
            <tr>
                    
                <th scope="col">#Carrito</th>
                <th scope="col">Fecha</th>
                <th scope="col">#Productos</th>
                <th scope="col"> Acciones </th>
   
            </tr>
        </thead>
        <tbody>
            <tr>
                    
            <td scope= 'row'><?=$carrito->getCarritoId();?></td>
            <td><?=$carrito->getFecha();?></td>
            <td><?=$carrito->getTablaNumReg();?></td>
            <td>  
                        <a href='../includes/pedido-inc.php?id=<?=$carrito->getCarritoId();?>'>Hacer Pedido</a> 
                        <a href='../includes/borrarCarrito.php?id=<?=$carrito->getCarritoId();?>'>Borrar carrito</a>   
            </td>
        </tr>
        </tbody>
        
</div>
<div>
     
    <table class = 'table table-striped' id="tlineasCarrito">
        <thead>
            <tr>
                <th scope="col">LineaId</th>
                <th scope="col">ProductoId</th>
                <th scope="col">ProductoNombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">PrecioUnitario</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineas as $key => $linea){
                echo "<tr>";
                echo "<td>".$linea['lincar_id']."</td>";
                echo "<td>".$linea['productos_pro_id']."</td>";
                echo "<td>".$linea['pro_nombre']."</td>";
                echo "<td>".$linea['lincar_cantidad']."</td>";
                echo "<td>".$linea['lincar_precioUnitario']."</td>";
                echo "<td>".$linea['subtotal']."</td>";
                echo "<td><a href='../includes/borrarLCarrito.php?id=".$linea['lincar_id']."'>Borrar artículo</a></td>";
                echo "</tr>";
                $total += $linea['subtotal'];

                }
                $carrito->setTotal($total);
            ?>
        </tbody>
    </table>
</div>
</section>


<?php include "../includes/footer.php"; ?> 

</body>
</html>