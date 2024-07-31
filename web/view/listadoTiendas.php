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
            echo "<td>  <button class = 'verDetails' id='verDetails".$todo['tie_id']."'>Ver Modal</button></td>";
//            echo "<td>  <button class = 'modal' id='verDetails'".$todo['tie_id'].">Ver Modal</button></td>";
            echo "</tr>";
           
            ?>
    </table>
</div>    
<dialog id="tieDialog<?=$todo['tie_id'];?>">
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
    (() => {
    const buttons = document.querySelectorAll('.verDetails');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const eldialog = document.querySelector(`#tieDialog${button.id.split('verDetails')[1]}`);
                eldialog.show();

                });
                });

    const buttonsCerrar = document.querySelectorAll('.cerrarDetails');
    buttonsCerrar.forEach(button => {
            button.addEventListener('click', () => {
                const eldialog = document.querySelector(`#tieDialog${button.id.split('cerrarDetails')[1]}`);
                eldialog.close();
                });
                });

  

    
    })();
  </script>  



</body>
</html>