<html>
<head>
    <title> Buscar mensajes de un usuario </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href=".\imgCodigo\laXarxaFavicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="../includes/productos.js"></script>

<!-- >    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /> <-->
        
</head>
<body>

    <?php
    $soy = "productos";
    $title ="Busqueda de Productos por texto";
    include "../includes/header.php"; 
    
    
    require_once "../model/Connection.php";
    require_once "../model/Producto.php";
    require_once "../controler/ProductoContr.php";
    $producto = new ProductoContr();
    
    
    $error= $texto= $mensajes = "";
    $seleccion = "";
  
      

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // verificar entrada por formulario
    
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
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <div  id="buscarProductos" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
            <form method="post" ref="">
            <span><?=$error;?></span>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control"  id= "texto" name="texto" value= "<?=$texto;?>" placeholder="Introduzca usuario"> 
                <label for ="texto">Texto</label> 
            </div> 
            <div>
                <input class="btn btn-primary" type="submit" name="signIn" value="Buscar">
            </div>
            </form>
            <div class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <a class="btnStack" href = "verProductos.php"> Cerrar Buscador </a>
            </div>
    </div>
    <div>
    
    <a href="#" onclick="javascript:ordenaPerNom()">[Ordena por Nom]</a>&nbsp;
    <a href="#" onclick="javascript:ordenaPerCategoria()">[Ordena por Categoria]</a>&nbsp;
    <a href="#"  onclick="javascript:ordenaPerPreu()">[Ordena por Precio ]</a><p>

    <table id="tProductos">
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

    
    <?php include ("../includes/footer.php");?>
</body>
<script>
// event para garantizar que la página está cargada antes de comprobaciones en el DOCUMENT
            document.addEventListener("DOMContentLoaded", function() {
            
            window.products = <?php echo json_encode($seleccion);?>;
            if (products) {escriureTaula(products);};
            });
</script>
</html>