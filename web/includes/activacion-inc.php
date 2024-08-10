
<?php
    $token = $_GET["token"];

    //instanciar las classes
    require "../model/Connection.php";
    require "../model/Usuario.php";
    require "../controler/usuarioContr.php";

    $newUsuario = new usuarioContr("","","","",$token);
   
    //ejecutar gestor de errores i crear nuevo password
    $newUsuario->activateAccount();

    //rederigir a la pagina de login
    
?>