<?php 


require "../model/connection.php";
require "../model/tienda.php";
$tienda = new Tienda();


if (isset ($_GET['id'])){
    $id = $_GET['id'];
    $tienda->setId($id);
    $result = $tienda->leer();
    $nombre = $direccion= $URLFoto = $AlTFoto = $telefono = "";
    $codpos = $municipio = $ven_id = $ven_username = $ven_email ="";

    if ($result) {
        $nombre = $tienda->getNombre();
        $direccion = $tienda->getDireccion();
        $URLFoto = $tienda->getURLFoto();
        $ALTFoto = $tienda->getAlTFoto();
        $telefono = $tienda->getTelefono();
        $codpos = $tienda->getCodpos();
        $municipio = $tienda->getMunicipio();
        $ven_id = $tienda->getVen_id();
        $ven_username =$tienda->getVen_username(); 
        $ven_email =$tienda->getVen_email(); 
        }

    };


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
$title="Ficha de tienda ( se podrian añadir existencias de producto? )";
$soy = "tienda";
include "../includes/header.php"; ?>
<h2>Ficha de tienda</h2>

<div class="cards-container mt-3">
        <div class="card">
        <img src="<?=$URLFoto;?>" alt="<?=$ALTFoto;?>" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Tienda:<?=$nombre;?></h3>
                        <p class="card-text">Direccion:<?=$direccion;?></p>
                        <p class="card-text">Municipio:<?=$codpos;?>//<?=$municipio;?></p>
                        <p class="card-text">Responsable:<?=$ven_username;?></p>
                        <p class="card-text">email:<?=$ven_email;?></p>
                        <a href="#">Leer más</a>
                                               
                    </div>
        </div>
</div>
    
<?php /*include "../includes/footer.php";*/ ?> 

</body>
</html>