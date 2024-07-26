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


<?php 
$title="Tienda Productos";
require "../model/connection.php";
require "../model/producto.php";
$producto = new producto();
$categorias = $producto->categorias();

?>
<?php include "../includes/header.php"; ?>
<div class="container mt-3">
    
    <form action="../includes/productoInsertar.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre">Nombre Producto:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Introduzca nombre producto" name="nombre">
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control" id="descripcion" placeholder="Introduzca descripcion" name="descripcion" required>
        </div>
        <div class="mb-3">
            <label for="precio">Precio Unitario:</label>
            <input type="numeric" class="form-control" id="precio" placeholder="Introduzca Precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="URLFoto">URLFoto:</label>
            <input type="file" class="form-control" id="URLFoto" placeholder="Seleccione Imagen" name="URLFoto" required>
        </div>
        <div class="mb-3">      
            <label for ="ALTFoto">ALTFoto</label>
            <input type="text" class="form-control" id="ALTFoto" placeholder="Introduzca texto para Foto" name="ALTFoto" required>
        </div>
        <div>
            <label for ="categoria">Categoria</label>    
            <select id= "categoria" name="categoria">
<?php
                foreach ($categorias as $categoria)
                {
                echo "<option value=".$categoria['id'].">".$categoria['nombre']."</option>";
                }
?>
            </select>
        </div>
        
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>