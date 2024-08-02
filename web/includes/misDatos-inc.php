<?php
if(session_status() === PHP_SESSION_NONE) {session_start();};
if(!isset($_SESSION['userId'])){
    echo " la session no ha sido iniciada";
    exit();
    };

$id = $_SESSION["userId"];
//instanciar las classes
//require "autoload.models.php";
//require "autoload.controlers.php";
require "../model/Connection.php";
require "../model/Usuario.php";
require "../controler/usuarioContr.php";
$usuario = new UsuarioContr();

$usuario->setId($id);
$usuario->leerUser();

require "../model/Municipio.php";
require "../controler/municipioContr.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //print_r($_POST);

    // recoger datos del formulario
    $usuario->setEmail($_POST["email"]);
    $usuario->setApellido($_POST["apellido"]);
    $usuario->setNombre($_POST["nombre"]);
    $usuario->setDni ($_POST["dni"]);
    $usuario->setDireccion ($_POST["direccion"]);

    $codpos = $_POST["codpos"];
    $mun = new MunicipioContr($codpos);
    $res = $mun->checkMunicipio();
    $mun_id = $res ['mun_id'];
    
    
    $usuario->setMunicipio ($mun_id);
    $usuario->updateUser();

}else{
    $mun_Id = $usuario->getMunicipio();
    $mun = new MunicipioContr("","",$mun_Id);
    $mun->traerMunicipio();
};

?>