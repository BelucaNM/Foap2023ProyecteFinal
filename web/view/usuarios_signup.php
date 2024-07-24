
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SignUp User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php 
$title="Registro";
include "../includes/header.php"; 
require "../includes/municipios-inc.php";
?>
<div class="container mt-3">
    <h2>Sign Up</h2>
    <form action="../includes/signup-inc.php" method="post">
        <div class="mb-3">
            <label for="uid">Username:</label>
            <input type="text" class="form-control" id="uid" placeholder="Introduzca username" name="uid">
        </div>
        <div class="mb-3">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Introduzca password" name="pwd">
        </div>
        <div class="mb-3">
            <label for="repeatPwd">Repeat password:</label>
            <input type="password" class="form-control" id="repeatPwd" placeholder="Re-introduzca password" name="repeatPwd">
        </div>
        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Introduzca email" name="email">
        </div>
        <div class="mb-1 mt-1">      
            <label for ="codigoPostal">Codigo Postal</label>
            <select class="form-select  mb-1" id="codigoPostal" name="mun_id">
			<option value="">---------</option>
            <?php
                foreach ($todos as $municipio) {
                    echo"<option value=$municipio[mun_id]>$municipio[mun_codpos] $municipio[mun_nombre]</option>";
                };
            ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>

</body>
</html>