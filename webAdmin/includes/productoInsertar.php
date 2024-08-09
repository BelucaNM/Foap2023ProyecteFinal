<?php

print_r($_POST);
if (isset($_POST['submit'])) {
// guardar Imagen

    $urlImg = "";

    print_r($_FILES);
    if (isset($_FILES) && $_FILES["URLFoto"]["size"] != 0) {
        $destino = "../../webAdmin/imagenes";
        $file_name = $_FILES["URLFoto"]["name"];
        $file_tmp = $_FILES["URLFoto"]["tmp_name"];
        if (!file_exists($destino . "/" . $file_name)) {

            if (move_uploaded_file($file_tmp, $destino . "/" . $file_name)) {
                if (file_exists($destino . "/" . $file_name)) {
                    $urlImg = $destino . "/" . $file_name;
                    echo "**" . $urlImg;
                    echo "Archivo subido correctamente y se encuentra en el directorio webAdmin/imagenes.";
                } else {
                    $error = error_get_last();
                    echo "Error: " . $error["message"];
                }
            } else {
                $error = error_get_last();
                echo "Error al subir el archivo: " . $error["message"];
            }
        } else {
            $urlImg = $destino . "/" . $file_name;
            echo "el archivo ya existe ";


        }
    } else {
        echo "Selecciona una imagen ";
    }

    
require "../model/connection.php";
require "../model/producto.php";

$producto = new Producto('',$_POST['nombre'],$_POST['descripcion'],$urlImg,$_POST['ALTFoto'],$_POST['precio'],$_POST['categoria'],$_POST['ubicacion']);

$res = $producto->insertarDatos();

echo "respuesta ";
    var_dump($res);
    if ($res === true) {
       
  
        echo "Producto creado ";
        header("Location: ../view/listadoProductos.php?error=insertDone&sqlError=$res");
        exit();
        
    }else {
        
        echo "Error al insertar un producto ". $res;
        if ($res === '23000') {
            
            echo "Problemas por claves referenciadas ";
            header("Location: ../view/listadoProductos.php?error=FailedInsert&sqlError=ProductoClaveReferenciada"); 
            
        } else {
            echo "Error ".$res ;
            header("Location: ../view/listadoProductos.php?error=FailedInsert&sqlError=$res");
            
        
        }
        exit(); 

    
    }
};
?>