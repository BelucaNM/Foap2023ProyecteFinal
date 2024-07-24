<header>
   <div id="header" class = "container mt-3 clearfix">
        <span class="float-start"><img id="logo" src=".\imgCodigo\logo.jpg" class = "rounded-circle"></span>
        <span class="h1">Tiendas</span>
        <span class="h1 float-end"><?=$title;?></span>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="../index.php">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav  me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios_signup.php">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tiendas.php">Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">Pedidos</a>
                </li>
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav  me-auto">
                   <li class="nav-item">
                        <a href="../index.php">Login</a>
                    </li> 
                    <li class="nav-item">
                        <a href="../includes/logout.php">Logout</a>
                    </li>
                </ul>


            </div>
        </div>
    </div>
</nav>

</header>