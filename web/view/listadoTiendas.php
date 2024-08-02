<?php 
include "../includes/listadoTiendas-inc.php";

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
            echo "<td><a href='../view/verTienda.php?id=".$todo['tie_id']."'>Ver Detalles</a></td>";

            echo "<td><button class = 'verDetails' id='verDetails".$todo['tie_id']."'
                                data-id ='".$todo['tie_id']."'  
                                data-nombre = '".$todo['tie_nombre']."'  
                                data-direccion = '".$todo['tie_direccion']."'  
                                data-responsable = '".$todo['ven_username']."'  
                                data-email = '".$todo['ven_email']."'  
                                data-telefono = '".$todo['tie_telefono']."' 
                                data-municipio = '".$todo['mun_nombre']."' 
                                data-codpos = '".$todo['mun_codpos']."' 
                                >Ver Modal</button></td>"; // Utiliza data-SET para pasar datos al Modal

            echo "</tr>";
        };
?>

</table>
</div>
<dialog id="tieDialog">
    <form method="dialog">
      <section>
        <p>
        <h2>Ficha de tienda</h2>
        <p class="card-text" id="id"></p>
        <p class="card-text" id="title"></p>
        <p class="card-text" id="direccion"></p>
        <p class="card-text" id="municipio"></p>
        <p class="card-text" id="telefono"></p>
        <p class="card-text" id="responsable"></p>
        <p class="card-text" id="email"></p>
        </p>
      </section>
      <menu>
        <button id="cerrarDetails" class= "cerrarDetails" type="reset">Cerrar</button>
      </menu>
    </form>
</dialog>
  
<?php
 /* include "../includes/footer.php"; */ 
?>  

<script>
 (() => {
    const buttons = document.querySelectorAll('.verDetails');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const eldialog = document.getElementById('tieDialog');
                const id = button.dataset.id;
                const nombre = button.dataset.nombre;
                const direccion = button.dataset.direccion;
                const responsable = button.dataset.responsable;
                const email = button.dataset.email;
                const telefono = button.dataset.telefono;
                const municipio = button.dataset.municipio;
                const codpos = button.dataset.codpos;
                eldialog.show();
                document.getElementById('id').textContent = "Id :"+ nombre;
                document.getElementById('title').textContent = "Nombre de la Tienda :"+ nombre;
                document.getElementById('direccion').textContent = "Direccion : "+direccion;
                document.getElementById('municipio').textContent = "Municipio: " + codpos + " " + municipio ;
                document.getElementById('telefono').textContent = "TelefonoTienda : "+telefono;
                document.getElementById('responsable').textContent = "Responsable: "+responsable;
                document.getElementById('email').textContent = "email:" + email; 
                });
                });

    const buttonsCerrar = document.querySelectorAll('.cerrarDetails');
    buttonsCerrar.forEach(button => {
            button.addEventListener('click', () => {
                const eldialog = document.getElementById('tieDialog');
                eldialog.close();
                });
                });
    })();

  </script>  

</body>
</html>