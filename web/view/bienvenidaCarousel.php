
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bienvenida</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="stylesheet" type="text/css" href="styleCarousel.css"> 
</head>

<body>

<?php

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones


    if ( $_GET['error'] == 'Printed') {
        echo '<div class="alert alert-success" role="alert">Se ha generado el listado en DIR Prints.pdf.</div>';
    };
    if ( $_GET['error'] == 'FailedStmt') {
        echo '<div class="alert alert-success" role="alert">No se ha podido hacer la actualizacion.</div>';
    };
    if ( $_GET['error'] == 'FailedDelete') {
        echo '<div class="alert alert-success" role="alert">Error en el borrado del carrito.</div>';
    };
    if ( $_GET['error'] == 'EmptyCart') {
        echo '<div class="alert alert-success" role="alert">El carrito esta vacio.</div>';
    };
    if ( $_GET['error'] == 'noOrders') {
        echo '<div class="alert alert-success" role="alert">No hay pedidos para este usuario.</div>';
    };
    if ( $_GET['error'] == 'InternalError') {
        echo '<div class="alert alert-success" role="alert">El carrito no corresponde al usuario. Contacte con el administrador</div>';
    };
};
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['info'])) { 
    if ( $_GET['info'] == 'updateDone') {
        echo '<div class="alert alert-success" role="alert">Se han actualizado los datos del usuario.</div>';
    };
};

$title="Bienvenid@ a nuestra tienda Outlet";
$soy = "bienvenida";
include "../includes/header.php"; 

?>
<!-- Elemento de audio -->
<audio id="startup-sound1" src="../audio/camera-shutter-6305.mp3" preload="auto"></audio>
<audio id="startup-sound2" src="../audio/camara_5.mp3" preload="auto"></audio>
<main>


    <section id="gruposProducto" class="section">
        <h2>Productos</h2> <!-- carrusel -->
        <div class="cards-container">
            
        
            <div>
            <button id = 'Anterior'  class="prev" onclick="plusSlides(-1)">&#10094</a> <!-- ; -->   
            <button  id = 'Posterior' class="next" onclick="plusSlides(1)">&#10095</a> <!--;-->
            </div>
            
            <div id = '0' class="card mySlide myFade">
                <div class="numbertext">1/11</div>
                <img src="../img/imagenCamarasANA200px.jpg" alt="ImagenCamarasANA" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Cámaras Analógicas</h3>
                    <p class="card-text">Contenido ejemplo para la categoria de Cámaras. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace" href="#">Leer más</a>
                <a class = "btn btn-primary card-boton"  href="verProductos.php?cat=1">Ver Productos</a>
            </div>
            <div id = '1' class="card mySlide myFade">
                <div class="numbertext">2/11</div>
                <img src="../img/imagenCamarasDIG200px.jpg" alt="ImagenCamarasDIG" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Cámaras Digitales</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de de Cámaras Digitales. Esto es una vista previa.</p>
                </div>    
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton"   href="verProductos.php?cat=2">Ver Productos</a>
           </div>
            <div id = '2' class="card mySlide myFade">
                <div class="numbertext">3/11</div>
                <img src="../img/imagenObjetivosMAN200px.jpg" alt="ImagenObjetivosMAN" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Objetivos Manuales</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de objetivos manuales. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton"  href="verProductos.php?cat=3" >Ver Productos</a>
            </div>
            <div id = '3'  class="card mySlide myFade">
                <div class="numbertext">4/11</div>
                <img src="../img/imagenObjetivosAUT200px.jpg" alt="ImagenObjetivosAUT" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Objetivos Automáticos</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de objetivos automáticos. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=4">Ver Productos</a>
            </div>
            <div id = '4' class="card mySlide myFade">
                <div class="numbertext">5 / 11</div>
                <img src="../img/imagenFiltros200px.jpg" alt="ImagenFiltros" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Filtros</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de Filtros. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=5">Ver Productos</a>
            </div>
            <div id = '5' class="card mySlide myFade">
                <div class="numbertext">6 / 11</div>
                <img src="../img/imagenSoportes200px.jpg" alt="ImagenSoportes" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Tripodes y Soportes</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de Soportes. Esto es una vista previa.</p>
                </div>
                <a href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=6">Ver Productos</a>
            </div>
            <div  id = '6' class="card mySlide myFade">
                <div class="numbertext">7 / 11</div>
                <img src="../img/imagenAdaptadores200px.jpg" alt="ImagenAdaptadores" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Adaptadores</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de Adaptadores. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=7">Ver Productos</a>
            </div>
            <div id = '7' class="card mySlide myFade">
                <div class="numbertext">8/11</div>
                <img src="../img/imagenBaterias200px.jpg" alt="ImagenBaterias" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Baterias</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de productos de Baterias. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=8">Ver Productos</a>
            </div>
            <div id = '8' class="card mySlide myFade">
                <div class="numbertext">9/11</div>
                <img src="../img/imagenCables200px.jpg" alt="ImagenCables" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Cables</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de Cables. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=9">Ver Productos</a>
            </div>
            <div  id = '9' class="card mySlide myFade">
                <div class="numbertext">10/11</div>
                <img src="../img/imagenBolsas200px.jpg" alt="ImagenBolsas" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Bolsas y Fundas</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de bolsas y fundas. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=10">Ver Productos</a>
            </div>
            <div id = '10' class="card mySlide myFade">
                <div class="numbertext">11/11</div>
                <img src="../img/imagenAccesorios200px.jpg" alt="ImagenAccesorios" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Accesorios</h3>
                    <p class="card-text">Contenido de ejemplo para el grupo de Accesorios. Esto es una vista previa.</p>
                </div>
                <a class = "card-enlace"  href="#">Leer más</a>
                <a class = "btn btn-primary card-boton" href="verProductos.php?cat=11">Ver Productos</a>
            </div>
        </div>
    </section>

    <section id="FAQS" class="section">
            <h2>FAQS</h2>
            <p>Aquí van tres divs, para explicar cuanto tarda en llegar un pedido, la politica de devoluciones, o el medio de pago.</p>
            <div class="cards-container">
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Cuanto tarda en llegar un pedido</h3>
                        <p class="card-text">Aqui se explicará como se hacen los envios. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Política de devoluciones</h3>
                        <p class="card-text">Aqui se explicará la política de devoluciones. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="caja">

                    <div class="card-body">
                        <h3 class="card-title">Medios de Pago</h3>
                        <p class="card-text">Aqui se explicará cómo hacer el pago. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
    </section>

    <section id="contacto" class="section">
            <h2>Contacto</h2>
            <p>Aqui se  agregará un enlace de email y un enlace para chat.</p>
    </section>
</main>
<?php include "../includes/footer.php";  ?>    
<script>

    function showSlides(primerIndex) {
        let slides = document.querySelectorAll('.mySlide');
        let totalSlides = slides.length;
        let numero = document.verCards;
    
        for (i = 0; i < totalSlides; i++) {
            console.log ("Presentando el Slide" + i);
            if ((i>=primerIndex)&& (i<primerIndex+numero)) {
                slides[i].style.display = "inline-block";   
            }else{ slides[i].style.display = 'none'; // Ocultar todos los slides
            }
        };
        var audio = document.getElementById('startup-sound1');
        audio.play();
    };

// Next/previous controls
    function plusSlides(n){ 
        // Busca el identificador del 1er slide que tiene el display = 'inline-block'
        // Selecciona todos los elementos con la clase 'mySlide'
        const elements = document.querySelectorAll('.mySlide');
        let totalSlides = elements.length;
        // Filtra los elementos que tienen display: inline-block
        console.log (elements);
        const inlineBlockElements = Array.from(elements).filter(element => {
            return element.style.display === 'inline-block';
        });

        console.log(inlineBlockElements);
        // Obtiene el primer elemento que tiene display: inline-block
        let elPrimero = inlineBlockElements[0];
  
        console.log (elPrimero);
        let primerIndex = parseInt(elPrimero.id);
        let ultimoIndex= 0;
        let numero = document.verCards-1 ;
  
        if (n>0) {
            primerIndex= primerIndex + parseInt(n);
            ultimoIndex = primerIndex + numero + parseInt(n);
            if (ultimoIndex > totalSlides-1) {
                ultimoIndex =totalSlides-1; 
                primerIndex = ultimoIndex -numero;};
            };
        if (n<0) {
            primerIndex= primerIndex +n;
            if (primerIndex < 0) {
                    ultimoIndex =numero; 
                    primerIndex = 0;};
                };
        showSlides(primerIndex)
    };

window.onload = function() {
    let primerIndex = 0;
    document.verCards = 4; 
    showSlides(primerIndex);
    
};

</script>
</body>
</html>