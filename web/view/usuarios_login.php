<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tiendas</title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href="..\img\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

    if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_GET['error'])) { // Validaciones

        if ( $_GET['error'] == 'RegisterDone') {
            echo '<div class="alert alert-success" role="alert">Por favor, compruebe su email. Recibirá un correo de activación.</div>';
            };
        if ( $_GET['error'] == 'activAccount') {
            echo '<div class="alert alert-success" role="alert">Su cuenta ha sido activada.</div>';
            };
        if ( $_GET['error'] == 'emailForgotPassword') {
            echo '<div class="alert alert-success" role="alert">Por favor, compruebe su email. Recibirá un correo para nuevo password.</div>';
            };
        if ( $_GET['error'] == 'NewPassSaved') {
                echo '<div class="alert alert-success" role="alert">Su password se ha actualizado correctamente.</div>';
                };
        if ( $_GET['error'] == 'inactiveAccount') {
                echo '<div class="alert alert-success" role="alert">Cuenta inactiva. Contacte con la tienda.</div>';
                };
            
    };
    $title="Login";
    $soy = "login";
    include "../includes/header.php"; 
?>

<section id="cuerpoView" class="section">
  <div class="container mt-3">
    <form action="../includes/login-inc.php" method="post">
      <div class="mb-3">
        <label for="uid">Username:</label>
        <input type="text" class="form-control" id="uid" placeholder="Enter your username" name="uid">
      </div>
      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
      <div class="mb-3">
        <a href="forgotpassword.php">Forgot Password?</a> /
        <a href="usuarios_signup.php">Don't have an account yet? Sign up here!</a>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>

<?php include "../includes/footer.php"; ?>

</body>
</html>
