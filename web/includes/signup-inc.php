<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // recoger datos del formulario
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $repeatPassword = $_POST["repeatPwd"];
    $email = $_POST["email"];
    $mun_id = $_POST["mun_id"];

/*    echo "username ".$username;
    echo "pass ".$password;
    echo "rep pass ".$repeatPassword;
    echo "email ".$email;
    echo "mun_id ".$mun_id; */

    //instanciar las classes
    //require "autoload.models.php";
    //require "autoload.controlers.php";

    require "../model/Connection.php";
    require "../model/Usuario.php";
    require "../controler/UsuarioContr.php";
    $signup = new UsuarioContr($username, $password, $repeatPassword, $email,"","","","","","","",$mun_id );
    $signup->signupUser();



}