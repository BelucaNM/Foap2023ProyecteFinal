<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];


    require "autoload.models.php";
    require "autoload.controlers.php";

    $login = new UsuarioContr($username, $password);
    $userId = $login->loginUser();

    session_start();
    $_SESSION["user"] = $username;
    $_SESSION["userId"] = $userId;

    

    //Ir a la pagina inicial
    header("Location: ../view/bienvenida.php");

}