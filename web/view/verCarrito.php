<?php 

    
require "../model/Connection.php";
require "../model/Carrito.php";

session_start();
if (isset ($_GET['id'])){

    $id = $_GET['id'];

    print_r($_SESSION);

    if (!isset ($_SESSION['user'])){
        header("Location: ../view/productosExistencias.php?id=$id&error='noLogged'");
        // " No es posible comprar sin estar identificado";
        exit();
    }

// recupera el número de carrito para el user

    $carrito = new Carrito ("","",$_SESSION['userId']); 
    $result = $carrito->recuperaCarrito();
    if (!$result) {
        echo " El carrito esta vacio."
    }

    }

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

<?php 
$title="Carrito";
$soy = "carrito";
include "../includes/header.php"; ?>
<h2>Carrito</h2>

<div class="cards-container mt-3">
        <div class="card">
        <img src="<?=$URLFoto;?>" alt="<?=$ALTFoto;?>" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title"><?=$nombre;?></h3>
                        <p class="card-text">Descripcion:<?=$descripcion;?></p>
                        <p class="card-text">Categoria:<?=$categoria;?>//<?=$nombreCat;?></p>
                        <p class="card-text">Fecha Alta:<?=$fecha;?></p>
                        <p class="card-text">Precio:<?=$precioUnitario;?></p>
                        <a href="#">Leer más</a>
<?php
if (isset($_SESSION['user'])){    
    echo "<a href='../includes/pedido-inc.php?id=".$id."'>Pedir</a>";
}
?>                                                
                    </div>
        </div>
</div>
    
<div id="existencias">
    <h2>Existencias</h2>  
    <table>
    <tr>
        <th>Tienda</th>
        <th>Telefono</th>
        <th>Contacto</th>
        <th>Existencias</th>
        
    </tr>
    <?php foreach ($existencias as $key => $stock){
        echo "<tr>";
        echo "<td>".$stock['tie_nombre']."</td>";
        echo "<td>".$stock['tie_telefono']."</td>";
        echo "<td>".$stock['ven_username']."</td>";
        echo "<td>".$stock['exi_cantidad']."</td>";
        echo "</tr>";
        }
    ?>
    </table>
</div>

<?php /*include "../includes/footer.php";*/ ?> 

</body>
</html>