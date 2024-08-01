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
            <th>Acciones</th>
            
        
        </tr>
        <?php foreach ($todos as $key => $todo){
            echo "<tr>";
            echo "<td>".$todo['tie_id']."</td>";
            echo "<td>".$todo['tie_nombre']."</td>";
            echo "<td>".$todo['tie_direccion']."</td>";
            echo "<td>".$todo['tie_telefono']."</td>";
            echo "<td>  <a href='../view/verTienda.php?id=".$todo['tie_id']."'>Ver Card</a></td>";
            echo "<td>  <button class = 'verDetails' 
                                data-id =".$todo['tie_id']." data-nombre = ".$todo['tie_nombre']." 
                                data-direccion = ".$todo['tie_direccion']." 
                                data-responsable = ".$todo['ven_username']." 
                                data-email = ".$todo['ven_email']." 
                                id='verDetails' onclick='muestraEsto(this);'>Ver Modal</button></td>";

//            echo "<td>  <button class = 'verDetails' id='verDetails".$todo['tie_id']."'>Ver Modal</button></td>";
//            echo "<td>  <button class = 'modal' id='verDetails'".$todo['tie_id'].">Ver Modal</button></td>";
            echo "</tr>";
           
            ?>
    </table>
</div>    
<dialog id="tieDialog">
    <form method="dialog">
      <section>
        <p>
        <h2>Ficha de tienda</h2>
        <h3 class="card-title">Tienda:<?=$todo['tie_nombre'];?></h3>
        <p class="card-text">Direccion:<?=$todo['tie_direccion'];?></p>
        <p class="card-text">Municipio:<?=$todo['mun_codpos'];?>//<?=$todo['mun_nombre'];?></p>
        <p class="card-text">Responsable:<?=$todo['ven_username'];?></p>
        <p class="card-text">email:<?=$todo['ven_email'];?></p>
        </p>
      </section>
      <menu>
        <button id="cerrarDetails<?=$todo['tie_id'];?>" class= "cerrarDetails" type="reset">Cerrar</button>
      </menu>
    </form>
  </dialog>
  <?php
}
 /*include "../includes/footer.php";*/ 
?>  

<script>


let muestraEsto = button => {
        let s = "Id = " + button.getAttribute('data-id') + "\r\n";
        s += "Nombre = " + button.getAttribute('data-nombre') + "\r\n";
        s += "Direccion = " + button.getAttribute('data-direccion') + "\r\n";
        s += "Responsable = " + button.getAttribute('data-responsable');

    alert(s);
  }

    

  </script>  



</body>
</html>