<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $codpos = $_POST["codpos"];
    $nombre = $_POST["nombre"];

//echo 'Creando instancia de tabla municipios <br>';

require "../model/Connection.php";
require "../model/Municipio.php";
require "../controler/municipioContr.php";
   
//instanciar las classes
//require "autoload.models.php";
//require "autoload.controlers.php";

$municipio = new MunicipioContr($codpos,$nombre);
$elMunicipio= $municipioContr->checkMunicipio();

if (!$elMunicipio) { // error STMT
        echo "Error al obtener municipio <br>";
    };
}
    ?>