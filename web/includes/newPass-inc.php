
<?php

// print_r($_POST);

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']) ){// Validaciones
    
    print_r($_POST);

    $password1 = $_POST["pwd"];
    $password2 = $_POST["repeatPwd"];
    $token=$_POST["token"];
    
//    echo 'Creando instancia de registro <br>';
    require "../model/Connection.php";
    require "../model/Usuario.php";
    require "../controler/usuarioContr.php";

    
    $passContr= new UsuarioContr("", $password1,$password2,"",$token);
    $passContr->valUpdatePassword();
              
   
};
?>