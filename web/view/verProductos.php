<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
    <meta charset="UTF-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="../includes/productos.js"></script>
</head>
<body>
<?php

if ( isset($_GET['info']) && $_GET['info'] == 'carro') {
    echo '<div class="alert alert-success" role="alert">Su artículo ha sido incorporado al carro. Por favor, RECUERDE, que la reserva solo se hace cuando confirme el pedido.</div>';
    };
if ( isset($_GET['info']) && $_GET['info'] == 'deliver') {
    echo '<div class="alert alert-success" role="alert">Su pedido ha sido realizado</div>';
    };

$title = "Relación de Productos";
$soy = "productos";
include "../includes/header.php"; 
include "../includes/verProductos-inc.php"; 

?>
    <section id="cuerpoPagina" class="section">
        
        <a href="#" onclick="javascript:ordenaPerNom()">[Ordena por Nombre]</a>&nbsp;
    <?php
    if (!isset($_GET['cat'])) { 
        echo '<a href="#" onclick="javascript:ordenaPerCategoria()">[Ordena por Categoria]</a>&nbsp;';
        };
    ?>
        <a href="#"  onclick="javascript:ordenaPerPreu()">[Ordena por Precio ]</a><p>

        <table class = 'table table-striped' id="tProductos">
            <thead>
                <tr>
                <th scope="col">#Id</th>
                <th scope="col">Categoria</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">URLFoto</th>
                <th scope="col">ALTFoto</th>
                <th scope="col" align="right" >PrecioUnitario</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $key => $todo){
                    echo "<tr>";
                    echo "<td scope= 'row'>".$todo['pro_id']."</td>";
                    echo "<td>".$todo['cat_nombre']."</td>";
                    echo "<td>".$todo['pro_nombre']."</td>";
                    echo "<td>".$todo['pro_descripcion']."</td>";
                    echo "<td>".$todo['pro_URLFoto']."</td>";
                    echo "<td>".$todo['pro_ALTFoto']."</td>";
                    echo "<td align='right'>".$todo['pro_precioUnitario']."</td>";
                    echo "<td>  <a href='../view/verProductoExistencias.php?id=".$todo['pro_id']."'>Ver</a> </td>";
                    echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <!-- Las opciones siguientes solo estan en la version de la APP para los vendedores
        <a href='../includes/productoEditar.php?id=".$todo['pro_id']."'>Editar</a>|
        <a href='../includes/productoEliminar.php?id=".$todo['pro_id']."'>Eliminar</a>| 
        <a href='nuevoProducto.php' class=""btn-2">Nuevo producto</a>| -->
    </section>

    <?php include "../includes/footer.php"; ?> 
</body>

<script>
// event para garantizar que la página está cargada antes de comprobaciones en el DOCUMENT
            document.addEventListener("DOMContentLoaded", function() {
            
            window.products = <?php echo json_encode($todos);?>;

            //Saca por Consola informacio del la pagina
            let url = document.URL;
            console.log ("la URL es :"+ url);


            })
</script>
</html>