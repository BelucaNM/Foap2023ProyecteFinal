
<?php 
$title="Pedido";
$soy = "pedido";


$lineas =[];
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['id'])) { 


require "../model/Connection.php";
require "../model/Pedido.php";
$pedido = new Pedido ($_GET['id']); 
$lineas = $pedido->traerLineas();
//print_r($lineas);
$total = 0;
};
?>
<h2>Pedido</h2>
<div id="lineas">
    <h2>Lineas Pedido</h2>  
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
        echo "<td>".$linea['lin_id']."</td>";
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
    </table>
</div>


</body>
</html>