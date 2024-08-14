<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuevo Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
<?php
    $title="Recuperacion de Password";
    $soy = "newPassword";
    include "../includes/header.php"; 

    $token = "";
    if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['token']) ){// Validaciones
        
        $token = $_GET['token'];
        };

    if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones

        if ( $_GET['error'] == 'EmptyInput&token') {
            echo '<div class="alert alert-success" role="alert"> la entrada está vacia</div>';
        };
        if ( $_GET['error'] == 'PasswordsDontMatch&token') {
            echo '<div class="alert alert-success" role="alert"> las contraseñas no coinciden</div>';
        };
        if ( $_GET['error'] == 'tokenNotExist') {
            echo '<div class="alert alert-success" role="alert"> el token  no existe</div>';
        };
        if ( $_GET['error'] == 'tokenExpired') {
            echo '<div class="alert alert-success" role="alert"> el token está caducado</div>';
        };
        if ( $_GET['error'] == 'FailedStmt') {
            echo '<div class="alert alert-success" role="alert"> el stmt es incorrecto</div>';
        };
        
    };

?>
<section id="cuerpoView" class="section">
    <div class="container mt-3">
        <h2>New Password</h2>
        <form action="../includes/newPass-inc.php" method="post">
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="mb-3">
                <label for="repeatPwd">Repeat password:</label>
                <input type="password" class="form-control" id="repeatPwd" placeholder="Enter password" name="repeatPwd">
            </div>
            <div class="form-floating mb-1 mt-1">
                <input type="text" class="form-control" id="token" name="token" value="<?=$token;?>"  hidden readonly  >

            </div> 
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</section>
</body>
</html>