<?php
require_once ("../model/Connection.php");
require_once ("../model/Producto.php");

$record = new Producto();

if (isset($_GET['id'])){
    $record->setId($_GET['id']);
    $res = $record->eliminar();
    echo "respuesta ";
    var_dump($res);
    
    if ($res === true) {
       
  
        echo "Producto Eliminado ";
        header("Location: ../view/listadoProductos.php?error=deleteDone&sqlError=$res");
        exit();
        
    }else {
        
        echo "Error al eliminar el producto ". $res;
        if ($res === '23000') {
            
            echo "Producto con existencias o un pedido asociado ";
            header("Location: ../view/listadoProductos.php?error=FailedDelete&sqlError=ProductoClaveReferenciada"); 
            
        } else {
            echo "Error ".$res ;
            header("Location: ../view/listadoProductos.php?error=FailedDelete&sqlError=$res");
            
        
        }
        exit(); 

    
    }

}
?>
