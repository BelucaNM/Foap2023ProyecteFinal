
<?php 
$title="Pedido";
$soy = "pedido";

include "../includes/verPedido-inc.php"
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