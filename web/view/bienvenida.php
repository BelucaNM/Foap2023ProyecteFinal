
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bienvenida</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    *{
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
    header {
        background-color: #333;
        color: white;
        padding: 10px 0;
        text-align: center;
        }
    nav {
        margin-top: 10px;
        }
    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        }
    main {
        padding: 20px;
        }
    .section {
        margin-bottom: 30px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        }
    .cards-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        }
    .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        }
    .card-body {
        padding: 15px;
        }
    .card-title {
        font-size: 1.5em;
        margin: 0 0 10px;
        }
    .card-text {
        font-size: 1em;
        margin: 0 0 15px;
        }
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        }
    </style>
</head>

<body>

<?php
session_start();

if(!isset($_SESSION['user'])){
    echo " la session no ha sido iniciada";
    header("Location: ../index.php");
    exit();
}
$user = $_SESSION['user'];
if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones

    if ( $_GET['error'] == 'Printed') {
        echo '<div class="alert alert-success" role="alert">Se ha generado el listado en DIR Prints.pdf.</div>';
    };
    
};

$title="Bienvenida";
include "../includes/header.php"; ?>

?>
<main>
<section id="inicio" class="section">
        <h2>Inicio</h2>
        <p>Bienvenido/a a nuestra página. Aquí puedes navegar por las diferentes secciones.</p>
</section>

<section id="cards" class="section">
        <h2>Cards</h2>
        <div class="cards-container">
                <div class="card">
                    <img src="https://via.placeholder.com/300" alt="Imagen de Ejemplo 1" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Título de Ejemplo 1</h3>
                        <p class="card-text">Contenido de ejemplo para la entrada del blog. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300" alt="Imagen de Ejemplo 2" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Título de Ejemplo 2</h3>
                        <p class="card-text">Contenido de ejemplo para la entrada del blog. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/300" alt="Imagen de Ejemplo 3" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Título de Ejemplo 3</h3>
                        <p class="card-text">Contenido de ejemplo para la entrada del blog. Esto es una vista previa.</p>
                        <a href="#">Leer más</a>
                    </div>
                </div>
        </div>
    </section>

    <section id="texto" class="section">
            <h2>Texto</h2>
            <p>Este es un ejemplo de texto en una sección de la página. Puedes agregar todo el contenido que necesites aquí.</p>
    </section>

    <section id="contacto" class="section">
            <h2>Contacto</h2>
            <p>Aquí puedes incluir un formulario de contacto, información de contacto o cualquier otra cosa que desees.</p>
    </section>
    </main>
</body>
</html>