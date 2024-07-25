<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    print_r($_POST);

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $repeatPassword = $_POST["repeatPwd"];
    $email = $_POST["email"];
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
    $signup = new UsuarioContr($username, $password, $repeatPassword, $email,"","","","","","","",$mun_id );
    $signup->signupUser();



}