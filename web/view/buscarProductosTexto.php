<html>
<head>
    <title> Buscar mensajes de un usuario </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../includes/productos.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css"/> 
        
</head>
<body>

    <?php

    $soy = "buscar";
    $title ="Busqueda de Productos por texto";
    include "../includes/header.php"; 
    include "../includes/buscarTexto-inc.php";
     
    ?>
<section id="cuerpoView" class="section">
    <div  id="buscarProductos" class = "container mt-3">
        <form method="post" ref="">
            <span><?=$error;?></span>
            <div class="mb-3">
                <input type="text" class="form-control"  id= "texto" name="texto" value= "<?=$texto;?>" placeholder="Introduzca texto"> 
 
            </div> 
            <div>
                <input class="btn btn-primary" type="submit" name="signIn" value="Buscar">
            </div>
            </form>
            <div class = "container mt-3">
                <a class="btnStack" href="verProductos.php">Cerrar Buscador</a>
            </div>
    </div>
    <section>

</section>
<div id="navOrdena">
<!--    
    <a href="#" onclick="javascript:ordenaPerNom()">[Ordena por Nom]</a>&nbsp;
    <a href="#" onclick="javascript:ordenaPerCategoria()">[Ordena por Categoria]</a>&nbsp;
    <a href="#"  onclick="javascript:ordenaPerPreu()">[Ordena por Precio ]</a><p>
-->
</div>   
<table id="tProductos">
    <!--
    <tr>
        <th>ProductoId</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>URLFoto</th>
        <th>ALTFoto</th>
        <th>PrecioUnitario</th>
        <th>Acciones</th>
    </tr>
-->
    <?php 
/*      foreach ($seleccion as $key => $linea){
        echo "<tr>";
        echo "<td>".$linea['pro_id']."</td>";
        echo "<td>".$linea['cat_nombre']."</td>";
        echo "<td>".$linea['pro_nombre']."</td>";
        echo "<td>".$linea['pro_descripcion']."</td>";
        echo "<td>".$linea['pro_URLFoto']."</td>";
        echo "<td>".$todo['pro_ALTFoto']."</td>";
        echo "<td>".$todo['pro_precioUnitario']."</td>";
        echo "<td>  <a href='../view/verProductoExistencias.php?id=".$todo['pro_id']."'>Ver</a> </td>";
        echo "</tr>";
        }*/
    ?>
    </table>
    
    </div>

    
    <?php include "../includes/footer.php";?>
</body>
<script>
// event para garantizar que la página está cargada antes de comprobaciones en el DOCUMENT
            document.addEventListener("DOMContentLoaded", function() {
            
            window.products = <?php echo json_encode($seleccion);?>;
            if (products) {escriureTaula(products);};
            });
</script>
</html>