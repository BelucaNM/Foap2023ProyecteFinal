
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SignUp User</title>
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
$title="Registro";
$soy = "registro";
include "../includes/header.php"; 
require "../includes/municipios-inc.php";
?>
<section id="cuerpoView" class="section">
    <div class="container mt-3">
        
        <form id ="datosForm" action="../includes/signup-inc.php" method="post">
            <div class="mb-3">
                <label for="uid">Username:</label>
                <input type="text" class="form-control" id="uid" placeholder="Introduzca username" name="uid">
                <span id="fusernameError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Introduzca password" name="pwd">
                <span id="fpwdError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="repeatPwd">Repeat password:</label>
                <input type="password" class="form-control" id="repeatPwd" placeholder="Re-introduzca password" name="repeatPwd">
                <span id="frepeatPwdError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Introduzca email" name="email">
                <span id="femailError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-1 mt-1">      
                <label for ="codpos">Codigo Postal</label>
                <input type="text" class="form-control" id="codpos" placeholder="Introduzca codigo postal"   name="codpos">
                <span id="fcodposError" style="font-size: small; color: #f00;"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

<?php include "../includes/footer.php"; ?>

<script> 
// Validación de campos de entrada en el navegador

document.addEventListener("DOMContentLoaded", function() {
    let onlyLetters = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ ]*$/u;
    let onlyNumbers = /^[0-9]$/;
    let formatoFecha= /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
    let patternDni= /^[0-9]{8}[A-Za-z]{1}$/;
    let patternEmail=/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    
    // Expresión regular para username: al menos 7 caracteres, una mayúscula, una minúscula y un carácter especial
    const usernameRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{7,}$/;
    // Expresión regular para password: al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;
    

    function validate_input($input)
    { // sanear datos
        $input.trim(); // quitar blancos al principio y al final
        $input = escapeHtml($input); // quitar caracteres html
        $input = stripSlashes($input); // quitar slashes
        return $input;

    };

    function stripSlashes (str) {
        return String(str).replace(/\\/g, '');
        };
  
    function escapeHtml (str) {
        var entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;'
        };
        return String(str).replace(/[&<>"'`=\/]/g, function (s) {
        return entityMap[s];
        });
        };

    function countDigits(str) {
        var count = 0;
        let array = str.split('');
        array.forEach(function(val) {
        if((val.charCodeAt(0)>47) && (val.charCodeAt(0)<58)) {
            count += 1;
            }            
        });
        return count;
        };
    
    function getStrongLevel(password) {
        var level = 0;
        level += password.length > 6 ? 1 : 0;
        level += /[!@#$%^&*?_~]{2,}/.test(password) ? 1 : 0;
        level += /[a-z]{2,}/.test(password) ? 1 : 0;
        level += /[A-Z]{2,}/.test(password) ? 1 : 0;
        level += /[0-9]{2,}/.test(password) ? 1 : 0;
        return level;
    }
        

    
    const emiForm = document.getElementById("datosForm");
    console.log (emiForm);
    emiForm.addEventListener('submit', (event)=>{

        let error= false
        let unnumero = false
        let found = ""
        let unCampoConNumero = false
        
        //interrumpe el funcionamiento del evento que lo envoca en este caso es el submit, por lo tanto para el envio del formulario
        event.preventDefault()
        
        

         // validacion username 
         fusername = document.getElementById("uid").value.trim()
        // con la funcion trim quitamos los espacios en blanco de delante y detras para evitar que el usuario intoduzca solo espacios en blanco
        let fusernameError = document.getElementById("fusernameError") //elemento span para mostrar errores en la entrada del campo
        fusernameError.innerHTML =""
        if(fusername.length==0){ // campo obligatorio
            fusernameError.innerHTML = "El campo USERNAME no puede estar vacio"
            error = true
        }else{ 
            if (!usernameRegex.test(fusername)){
                error = true
                fusernameError.innerHTML = "El username debe contener al menos 7 caracteres, una mayúscula, una minúscula y un carácter especial"
                }
        }

        // validacion password 
        fpwd = document.getElementById("pwd").value.trim()
        // con la funcion trim quitamos los espacios en blanco de delante y detras para evitar que el usuario intoduzca solo espacios en blanco
        let fpwdError = document.getElementById("fpwdError") //elemento span para mostrar errores en la entrada del campo
        
        fpwdError.innerHTML =""
        if(fpwd.length==0){ // campo obligatorio
            fpwdError.innerHTML = "El campo PASSWORD no puede estar vacio"
            error = true
        }else{ 
            if (!passwordRegex.test(fpwd)){
                error = true
                fpwdError.innerHTML = "El username debe contener al menos 7 caracteres, una mayúscula, una minúscula y un carácter especial"
                }
        }

        // validacion repetición password
        frepeatPwd = document.getElementById("repeatPwd").value.trim()
        // con la funcion trim quitamos los espacios en blanco de delante y detras para evitar que el usuario intoduzca solo espacios en blanco
        let frepeatPwdError = document.getElementById("frepeatPwdError") //elemento span para mostrar errores en la entrada del campo
        
        frepeatPwdError.innerHTML =""
        if(frepeatPwd.length==0){ // campo obligatorio
            frepeatPwdError.innerHTML = "Debe reintroducir el PASSWORD en este campo"
            error = true
        }else{ 
            if (frepeatPwd !== fpwd) {
                error = true
                frepeatPwdError.innerHTML = "Se requiere que introduzca el mismo PASSWORD"
                }
        }
        
        // validacion email
        let femail = document.getElementById("email").value.trim()
        let femailError = document.getElementById("femailError")
        femailError.innerHTML =""
        if(femail.length==0){ // obligatorio
            femailError.innerHTML = "El campo email es obligatorio"
            error = true
        }else{
            if (!patternEmail.test(femail)){
                error = true
                femailError.innerHTML = " Formato de email incorrecto"
            }
        }

        // validacion codpos
        let fcodpos = document.getElementById("codpos").value.trim()
        let fcodposError = document.getElementById("fcodposError")
        fcodposError.innerHTML =""
        if(fcodpos.length==0){ // obligatorio
            fcodposError.innerHTML = "El Código Postal es obligatorio"
            error = true
            
        }

        //Si no hay ningun error enviar el formulario
        if(!error) {emiForm.submit()}

    });

});
</script>
</body>
</html>