<?php 

$title="Tienda Productos";
require "../model/connection.php";
require "../model/producto.php";
$producto = new producto();
$categorias = $producto->categorias();

if (isset ($_GET['id'])){
    $id = $_GET['id'];
    $producto->setId($id);
    $record = $producto->traerUno();
    $val = $record[0];
    print_r ($val);
}

if (isset($_POST['actualizar'])){
    print_r ($_POST);
    $producto->setNombre($_POST['nombre']);
    $producto->setDescripcion($_POST['descripcion']);
    $producto->setPrecioUnitario($_POST['precioUnitario']);
    $producto->setURLFoto($_POST['URLFoto']);
    $producto->setALTFoto($_POST['ALTFoto']);
    $producto->setCategoria($_POST['categoria']);

    $producto->actualizar();

    echo "<script>  alert('Datos actualizados');
                document.location='../view/listadoProductos.php';
    </script>";
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>




<?php include "../includes/header.php"; ?>
<h2>Actualizar producto</h2>
<div class="container mt-3">
    
    <form action="" method="post">
        <div class="mb-3">
            <label for="nombre">Nombre Producto:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Introduzca nombre producto" name="nombre" value="<?=$val['pro_nombre'];?>" >
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" placeholder="Introduzca descripcion" name="descripcion" required value="<?=$val['pro_descripcion'];?>">
        </div>
        <div class="mb-3">
            <label for="precio">Precio Unitario:</label>
            <input type="numeric" class="form-control" id="precio" placeholder="Introduzca Precio" name="precioUnitario" required value="<?=$val['pro_precioUnitario'];?>">
        </div>
        <div class="mb-3">
            <label for="URLFoto">URLFoto:</label>
            <input type="text" class="form-control" id="URLFoto" placeholder="Introduzca URLFoto" name="URLFoto" required value="<?=$val['pro_URLFoto'];?>">
        </div>
        <div class="mb-3">      
            <label for ="ALTFoto">ALTFoto</label>
            <input type="text" class="form-control" id="ALTFoto" placeholder="Introduzca texto para Foto" name="ALTFoto" required value="<?=$val['pro_ALTFoto'];?>">
        </div>
        <div>
            <label for ="categoria">Categoria</label>    
            <select id= "categoria" name="categoria" >
<?php
                foreach ($categorias as $categoria)
                {
                    if ($categoria['id'] == $val['pro_categoria']) {
                        echo "<option value='$categoria[id]' selected>$categoria[nombre]</option>";
                    } else {
                         echo "<option value='$categoria[id]'>$categoria[nombre]</option>";
                    }

                }
?>
            </select>
        </div>
        
        <button name="actualizar" type="submit" class="btn btn-primary" value="Actualizar">Submit</button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>