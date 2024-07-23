<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $repeatPassword = $_POST["repeatPwd"];
    $email = $_POST["email"];

    echo "username ".$username;
    echo "pass ".$password;
    echo "rep pass ".$repeatPassword;
    echo "email ".$email;


    //instanciar las classes
    //require "autoload.models.php";
    //require "autoload.controlers.php";

    require "../model/Connection.php";
    require "../model/Usuario.php";
    require "../controler/UsuarioContr.php";
    $signup = new UsuarioContr($username, $password, $repeatPassword, $email);
    $signup->signupUser();

    //Volver a la pagina inicial
    header("Location: ../index.php");

}