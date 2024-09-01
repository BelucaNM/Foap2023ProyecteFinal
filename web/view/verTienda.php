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
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
   
    $title="Acceso a una Tienda ( ¿se podrian añadir existencias de productos? )";
    $soy = "tienda";
    include "../includes/header.php"; 
    require "../includes/verTienda-inc.php";
?>

<section id="cuerpoPagina" class="section">
<div class="cards-container mt-3">
        <div class="card">
        <img src="<?=$URLFoto;?>" alt="<?=$ALTFoto;?>" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Tienda: <?=$nombre;?></h3>
                        <p class="card-text">Direccion: <?=$direccion;?></p>
                        <p class="card-text">Municipio: <?=$codpos;?>//<?=$municipio;?></p>
                        <p class="card-text">Responsable: <?=$ven_username;?></p>
                        <p class="card-text">email: <?=$ven_email;?></p>
                        <a href="#">Leer más</a>
                                               
                    </div>
        </div>
</div>
</section>
    
<?php include "../includes/footer.php"; ?> 

</body>
</html>