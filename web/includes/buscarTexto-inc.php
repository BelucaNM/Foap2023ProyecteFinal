
<?php
    require_once "../model/Connection.php";
    require_once "../model/Producto.php";
    require_once "../controler/productoContr.php";
    $producto = new ProductoContr();
    
    
    $error= $texto= $mensajes = "";
    $seleccion = "";
  
      

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica entrada por formulario
    
        if ((!isset ($_POST["texto"])) || (empty($_POST["texto"]))) {
            $error= "Introduzca Texto";
        } else {
            $texto = $_POST["texto"];
            $seleccion = $producto->traerCon($texto);
            if (is_null($seleccion)) {
                $error = " No hay productos con este texto ";
            
            };
        };
    };
    ?>