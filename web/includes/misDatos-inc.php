<?php
require "../model/Connection.php";
require "../model/Usuario.php";
require "../controler/usuarioContr.php";

session_start();
$id = $_SESSION["userId"];
$usuario = new UsuarioContr();
$usuario->setId($id);
$usuario->leerUser();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    print_r($_POST);

    // recoger datos del formulario
    $email = $_POST["email"];
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $municipio = $_POST["municipio"];
    $codpos = $_POST["codpos"];


    //instanciar las classes
    //require "autoload.models.php";
    //require "autoload.controlers.php";

    require "../model/Connection.php";
    require "../model/Municipio.php";
    require "../controler/municipioContr.php";
    $mun = new MunicipioContr($codpos);
    $mun_id = $mun->checkMunicipio();
    echo "mun_id ".$mun_id;

   
    require "../model/Usuario.php";
    require "../controler/usuarioContr.php";
    $signup = new UsuarioContr( '', '', '', $email, 
                                '', '', '',
                                $apellido, $nombre, $dni, $direccion, $municipio, $id );
    
    $signup->updateUser();

};
?>