<?php 


require "../model/connection.php";
require "../model/producto.php";
require_once ("../controler/ProductoContr.php");
$producto = new ProductoContr();

if ( isset($_GET['error']) && $_GET['error'] == 'noLogged') {
    echo '<div class="alert alert-success" role="alert">Por favor, recuerde que para comprar deberá primero identificarse en LOGIN.</div>';
    };

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $producto->setId($id);
    $nombre = $descripcion= $URLFoto = $AlTFoto = $categoria = "";
    $precioUnitario = $fecha = $nombreCat = "";

    $id = $_GET['id'];
    $producto->setId($id);
    $result = $producto->leer();
    var_dump($result);
    if ($result) {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $URLFoto = $producto->getURLFoto();
        $ALTFoto = $producto->getAlTFoto();
        $categoria = $producto->getCategoria();
        $precioUnitario = $producto->getPrecioUnitario();
        $fecha = $producto->getFecha();
        $nombreCat = $producto->nombreCategoria();
        $existencias = $producto->leerExistencias(); 
        }

    };

if (isset($_POST['actualizar'])){
    print_r ($_POST);
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setPrecioUnitario($_POST['precioUnitario']);
    $producto->setURLFoto($_POST['URLFoto']);
    $producto->setALTFoto($_POST['ALTFoto']);
    $producto->setCategoria($_POST['categoria']);

    $producto->actualizar();

    echo "<script>  alert('Datos actualizados');
                document.location='../view/listadoProductos.php';
    </script>";
        
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
$title="Ficha de Producto y Existencias";
$soy = "producto";
include "../includes/header.php"; ?>
<h2>Ficha de Producto</h2>

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
    echo "<a href='../includes/carrito-inc.php?id=".$id."'>Comprar</a>";
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