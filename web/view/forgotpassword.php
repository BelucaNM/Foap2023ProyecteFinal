<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recuperación de Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones

    if ( $_GET['error'] == 'EmailDoesNotExist') {
        echo '<div class="alert alert-success" role="alert"> El email no existe en Base de Datos</div>';
    };
    
};

$title="Recuperacion de Password";
$soy = "forPassword";
include "../includes/header.php"; 

?>

<section id="cuerpoView" class="section">
    <div class="container mt-3">
        
        <form action="../includes/forgotPass-inc.php" method="post">
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Introduzca su email" name="email">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
</body>
</html>