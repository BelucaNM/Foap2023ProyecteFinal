<?php 

$title="Mis Datos";
$soy = "misDatos";
include "../includes/header.php"; 
include "../includes/misDatos-inc.php"; 

?>
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
    
<section id="cuerpoView" class="section">
    <div class="container mt-3">
        <h2>Actualizar Datos</h2>
        <form action="../includes/misDatos-inc.php" method="post">
            <div class="mb-3">
                <label for="uid">Apellido:</label>
                <input type="text" class="form-control" id="uid" placeholder="Introduzca apellido" name="apellido" value ="<?=$usuario->getApellido();?>">
            </div>
            <div class="mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introduzca nombre" name="nombre" value ="<?=$usuario->getNombre();?>">
            </div>
            <div class="mb-3">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" placeholder="Introduzca dni" name="dni" value ="<?=$usuario->getDni();?>">
            </div>
            <div class="mb-3">
                <label for="email">email:</label>
                <input type="email" class="form-control" id="email" placeholder="Introduzca email" name="email" value ="<?=$usuario->getEmail();?>">
            </div>
            <div class="mb-3">      
                <label for ="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" placeholder="Introduzca codigo postal"   name="direccion" value ="<?=$usuario->getDireccion();?>">
            </div>
            <div class="mb-3">      
                <label for ="codpos">Codigo Postal</label>
                <input type="text" class="form-control" id="codpos" placeholder="Introduzca codigo postal"   name="codpos" value ="<?=$mun->getCodpos();?>">
            </div>
            <div class="mb-3">      
                <label for ="municipio">Municipio</label>
                <input type="text" class="form-control" id="municipio" placeholder="Introduzca municipio"   name="municipio" value ="<?=$mun->getNombre();?>">
            </div>
            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

<?php include "../includes/footer.php"; ?>

</body>
</html>