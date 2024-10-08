<header>
<section id="header" class="section">
<div class="container mt-3 d-flex justify-content-between align-items-center">
    <span class="d-flex align-items-center">
        <img id="logo" src="..\img\logo128.png" alt="Logo" >
        <span class="h1" style="margin-bottom: 0px;">bJEtivos</span>
    </span>
    <span class="h1" style="margin-bottom: 0px;"><?= $title; ?></span>
</div>
<!--
   <div class = "container mt-3 clearfix">
        <span class="float-start"><img id="logo" src="..\img\logo128.png" ></span>
        <span class="h1 float-start">bJEtivos </span>
        <span class="h1 float-end"> <?=$title;?> </span>
    </div>
-->
</section>

<section id="navegacion" class="section">
    <?php
    require '../includes/tablaNav.php'; 

    if(session_status() === PHP_SESSION_NONE) {session_start();};
    if(!isset($_SESSION['user'])){
        
        $tablaNav = $_tablaNav_sinSession;
        $user = "";
        echo " La session no ha sido iniciada";
    }else{
        
        $tablaNav = $_tablaNav_conSession;
        $user = $_SESSION['user'];
        echo " Session iniciada. ¡Bienvenido ".$user."!" ;
    };
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
        <?php
            if  (!array_key_exists($soy, $tablaNav)) {
                echo 'Opción no configurada en barra de NAVegación. Contacte con el Administrador.';
            }else{
        ?>
        <?php
            if  (array_key_exists('a_bienvenida', $tablaNav[$soy])) {
                echo '<a class="navbar-brand" href="bienvenidaCarousel.php">Bienvenida</a>';
            }else{
                echo '<a class="navbar-brand not-active" href="bienvenidaCarousel.php">Bienvenida</a>';
            }; 
        ?>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="collapsibleNavbar" style="text-align: left">
        
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
                        if  (array_key_exists('a_tiendas', $tablaNav[$soy])) {
                            echo '<a class="nav-link" href="verTiendas.php">Tiendas</a>';  
                        }else{
                            echo '<a class="nav-link not-active" href="verTiendas.php">Tiendas</a>';
                        };
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if  (array_key_exists('a_productos', $tablaNav[$soy])){
                            echo '<a class="nav-link" href="verProductos.php">Productos</a>';
                        }else{
                            echo '<a class="nav-link not-active" href="verProductos.php">Productos</a>'; 
                        };
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if  (array_key_exists('a_buscar', $tablaNav[$soy])) {
                            echo '<a class="nav-link" href="buscarProductosTexto.php">Buscar Productos por texto</a>';
                        }else{
                            echo '<a class="nav-link  not-active" href="buscarProductosTexto.php">Buscar Productos por texto</a>'; 
                        };
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if  (array_key_exists('a_pedidos',$tablaNav[$soy])) {
                            echo '<a class="nav-link" href="verPedidos.php">Ver Pedidos</a>';
                         }else{
                            echo '<a class="nav-link  not-active" href="verPedidos.php">Ver Pedidos</a>';
                        };
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if  (array_key_exists('a_carrito',$tablaNav[$soy])){
                            echo '<a class="nav-link" href="verCarrito.php"><i class="bi bi-cart">Carrito</i></a>';
                        }else{
                            echo '<a class="nav-link not-active" href="verCarrito.php"><i class="bi bi-cart">Carrito</i></a>';
                        };
                    ?>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownUsuario" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right: 100px;">
                        Usuario
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdownUsuario">
                        <li>
                        <?php
                            if  (array_key_exists('a_login',$tablaNav[$soy])){
                                echo ' <a class="dropdown-item" href="usuarios_login.php">Iniciar Session</a>';
                            }else{
                                echo ' <a class="dropdown-item not-active" href="usuarios_login.php">Iniciar Session</a>';
                            };
                        ?>
                        </li>
                        
                        <li>
                        <?php
                            if  (array_key_exists('a_datos',$tablaNav[$soy])){
                                echo '<a class="dropdown-item" href="usuarios_misDatos.php">Mis datos</a>';
                            }else{
                                echo '<a class="dropdown-item not-active" href="usuarios_misDatos.php">Mis datos</a>';
                            };
                        ?>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <?php
                            if  (array_key_exists('a_logout',$tablaNav[$soy])) {
                                echo '<a class="dropdown-item" href="../includes/logout.php">Logout</a>';
                            }else{
                                echo '<a class="dropdown-item not-active" href="../includes/logout.php">Logout</a>';
                            };
                        ?>
                        
                        </li>
                    </ul>
                </li>
            </ul>
          </div>
        

        
        <?php
            };
        ?>
        </div>
        </nav>
</section>

</header>
