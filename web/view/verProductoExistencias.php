<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php 
    $title="Producto y Existencias";
    $soy = "producto";
    include "../includes/header.php"; 
    include "../includes/verProductoExistencias-inc.php"; 
?>

<ul id="viewProExi">
<li id="viewizq">
<div class="cards-container mt-3">
    <div class="card">
            <img src="<?=$URLFoto;?>" alt="<?=$ALTFoto;?>" class="card-img">
            <h3 class="card-title"><?=$nombre;?></h3>
            <p class="card-text">Descripcion:<?=$descripcion;?></p>
            <p class="card-text">Categoria:<?=$categoria;?>//<?=$nombreCat;?></p>
            <p class="card-text">Fecha Alta:<?=$fecha;?></p>
            <p class="card-text">Precio:<?=$precioUnitario;?></p>
            <a class ="card-enlace" href="#">Leer más</a>
        
            <?php
                if (isset($_SESSION['user'])){    
                    echo "<a class = 'btn btn-primary card-boton' href='../includes/carrito-inc.php?id=".$id."'>Añadir al Carrito</a>";
                }
            ?>                                                
                    
    </div>
</div>
</li>

<li id="viewder">
<div id="existencias">
    <h2>Existencias</h2>  
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope="col">Tienda</th>
                <th scope="col">Telefono</th>
                <th scope="col">Contacto</th>
                <th scope="col">Existencias</th>
            </tr>
        </thead>
        
        <tbody>
    
    <?php foreach ($existencias as $key => $stock){
        echo "<tr>";
        echo "<td scope= 'row'>".$stock['tie_nombre']."</td>";
        echo "<td>".$stock['tie_telefono']."</td>";
        echo "<td>".$stock['ven_username']."</td>";
        echo "<td>".$stock['exi_cantidad']."</td>";
        echo "</tr>";
        }
        
    ?>
        </tbody>
    </table>
</div>
</li>
</ul>

<?php include "../includes/footer.php"; ?> 
</body>
</html>