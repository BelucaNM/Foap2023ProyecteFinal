<header>
<section id="header" class="section">
   <div id="header" class = "container mt-3 clearfix">
        <span class="h1 float-start">obJEtivos</span>
        <span class="h3 float-start"><?=$title;?></span>
        <span class="float-start"><img id="logo" src="..\img\logo.jpg" class = "rounded-circle"></span>
    </div>
</section>

<section id="navegacion" class="section">
<?php
require '../includes/tablaNav.php'; 

session_start();
if(!isset($_SESSION['user'])){
    echo " la session no ha sido iniciada";
    $tablaNav = $_tablaNav_sinSession;
    $user = "";
}else{
    echo " session iniciada";
    $tablaNav = $_tablaNav_conSession;
    $user = $_SESSION['user'];
};
?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">

           <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav  me-auto">
<?php
    if  ($tablaNav[$soy]['a_tiendas']) {
        echo '    
                <li class="nav-item">
                    <a class="nav-link" href="listadoTiendas.php">Tiendas</a>
                </li>'; }
    
    if  ($tablaNav[$soy]['a_productos']) {
        echo '
                <li class="nav-item">
                    <a class="nav-link" href="listadoProductos.php">Productos</a>
                </li>'; }

    if  ($tablaNav[$soy]['a_pedidos']) {
        echo '

                <li class="nav-item">
                    <a class="nav-link" href="verPedidos.php">Ver Pedidos</a>
                </li>'; }

    if  ($tablaNav[$soy]['a_carrito']) {
        echo '
                <li class="nav-item">
                    <a class="nav-link" href="verCarrito.php">Ver Carrito</a>
                </li>'; }
?>
            </ul>

            <div class="d-flex">
                <ul class="navbar-nav  me-auto">
<?php
    if  ($tablaNav[$soy]['a_login']) {
        echo '                
                   <li class="nav-item">
                        <a class="nav-link" href="usuarios_login.php">Iniciar Session</a>
                    </li>';}
    if  ($tablaNav[$soy]['a_logout']) {
        echo '      
                    <li class="nav-item">
                        <a class="nav-link" href="../includes/logout.php">Logout</a>
                    </li>';}
?>                
                </ul>


            </div>
        </div>
    </div>
    </nav>
</section>
</header>
