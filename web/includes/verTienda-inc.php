<?php 
require "../model/Connection.php";
require "../model/Tienda.php";
require "../controler/tiendaContr.php";
$tienda = new TiendaContr();


if (isset ($_GET['id'])){
    $id = $_GET['id'];
    $tienda->setId($id);

    $nombre = $direccion= $URLFoto = $AlTFoto = $telefono = "";
    $codpos = $municipio = $ven_id = $ven_username = $ven_email ="";

    if ($tienda->leerTienda()) {
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