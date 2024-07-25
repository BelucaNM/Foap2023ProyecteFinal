<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $codpos = $_POST["codpos"];
    $nombre = $_POST["nombre"];

//echo 'Creando instancia de tabla municipios <br>';

require "../model/connection.php";
require "../model/municipio.php";
require "../controler/municipioContr.php";
   
//instanciar las classes
//require "autoload.models.php";
//require "autoload.controlers.php";

$municipio = new municipioContr($codpos,$nombre);
$elMunicipio= $municipioContr->checkMunicipio();

if (!$elMunicipio) { // error STMT
        echo "Error al obtener municipio <br>";
    };
}
    ?>