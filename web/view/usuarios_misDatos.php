<?php 

$title="Mis Datos";
$soy = "misDatos";
include "../includes/header.php"; 
include "../includes/misDatos-inc.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tienda</title>
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
    
<section id="cuerpoView" class="section">
    <div class="container mt-3">
        <h2>Actualizar Datos</h2>
        <form id ="datosForm" action="../includes/misDatos-inc.php" method="post">
            <div class="mb-3">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Introduzca apellido" name="apellido" value ="<?=$usuario->getApellido();?>">
                <br><span id="fapellidoError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Introduzca nombre" name="nombre" value ="<?=$usuario->getNombre();?>">
                <br><span id="fnameError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" placeholder="Introduzca dni" name="dni" value ="<?=$usuario->getDni();?>">
                <br><span id="fdniError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for="femail">email:</label>
                <input type="email" class="form-control" id="femail" placeholder="Introduzca email" name="femail" value ="<?=$usuario->getEmail();?>">
                <br><span id="femailError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">      
                <label for ="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" placeholder="Introduzca dirección"   name="direccion" value ="<?=$usuario->getDireccion();?>">
                <br><span id="fdireccionError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">      
                <label for ="codpos">Codigo Postal</label>
                <input type="text" class="form-control" id="codpos" placeholder="Introduzca codigo postal"   name="codpos" value ="<?=$mun->getCodpos();?>">
                <br><span id="fcodposError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">      
                <label for ="municipio">Municipio</label>
                <input type="text" class="form-control" id="municipio" placeholder="Introduzca municipio"   name="municipio" value ="<?=$mun->getNombre();?>">
                <br><span id="fmunicipioError" style="font-size: small; color: #f00;"></span>
            </div>
            <div class="mb-3">
                <label for ="acepto">Acepto las condiciones de uso</label>
                <input type="checkbox"  id ="acepto" name ="acepto">
                <span id="faceptoError" style="font-size: small; color: #f00;"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

<?php include "../includes/footer.php"; ?>


<script> 
// Validación de campos de entrada en el navegador

document.addEventListener("DOMContentLoaded", function() {

    let onlyLetters = /^[A-Za-z]+$/;
    let onlyNumbers = /^[0-9]$/;
    let formatoFecha= /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
    let patternDni= /^[0-9]{8}[A-Za-z]{1}$/;
    let patternEmail=/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    let fdescripcion25 ="";


    function countDigits(str) {
        var count = 0;
        let array = str.split('');
        array.forEach(function(val) {
         if((val.charCodeAt(0)>47) && (val.charCodeAt(0)<58)) {
            count += 1;
            }            
        });
        return count;
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

        // validacion apellido 
        fapellido = document.getElementById("apellido").value.trim()
         // con la funcion trim quitamos los espacios en blanco de delante y detras para evitar que el usuario intodzca solo espacios en blanco
        let fapellidoError = document.getElementById("fapellidoError") //elemento span para mostrar errores en la entrada del campo
        
        fapellidoError.innerHTML =""
        if(fapellido.length==0){ // apellido es obligatorio
            fapellidoError.innerHTML = "El campo apellido no puede estar vacio"
            error = true
        }else{ 
            found= countDigits(fapellido)
            if ((found >= 1 )) {
                error = true
                fapellido1Error.innerHTML ="El campo apellido no debe tener números"
            }
        };

        // validacion nombre
        let fname = document.getElementById("nombre").value.trim()
        let fnameError = document.getElementById("fnameError") //accedo al elemento span nombreError
        fnameError.innerHTML =""

        // validacion fname
        if(fname.length==0){ // obligatorio
            fnameError.innerHTML = "El campo nombre no puede estar vacio"
            error = true
        }else{
            found= countDigits(fname)
            if ((found >= 1 )) {
                unCampoConNumero = true
                error = true
                fnameError.innerHTML ="El campo nombre no debe tener números"
            }
        };
    
    
        // validacion DNI
              
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E','T'];

        let fdni = document.getElementById("dni").value.trim()
        let numDNI   = fdni.substring(0,8)
        let letraDNI = fdni.substring(8,9)
        let fdniError = document.getElementById("fdniError")
        fdniError.innerHTML = ""

        if ((fdni.length != 9) ||  (numDNI<0) || (numDNI>99999999)) {
            fdniError.innerHTML= "El numero proporcionado no es valido "
            error = true
        } else {
            numResto23 = numDNI  % 23;
            letraDNIasignada = letras [numResto23];
            if ( letraDNIasignada !== letraDNI) {
                fdniError.innerHTML = " La letra asignada deberia ser " + letraDNIasignada+ " no se corresponde con la letra introducida";
                error = true
            }
        };


        // validacion email
        let femail = document.getElementById("femail").value.trim()
        let femailError = document.getElementById("femailError")
        femailError.innerHTML =""
        if(femail.length==0){ // obligatorio
            femailError.innerHTML = "El campo email es obligatorio"
            error = true
        }else{
            if (!patternEmail.test(femail)){
                error = true
                femailError.innerHTML = " Introduzca un email correcto"
            }
        };



        // "acepto las condiciones.."marcado
        let facepto = document.getElementById("acepto")
        let faceptoError = document.getElementById("faceptoError")
        console.log (facepto)
        if (!facepto.checked) { 
            faceptoError.innerHTML = "Debe aceptar las condiciones de uso"
            error = true
        }

    
    
 
        //Si no hay ningun error enviar el formulario
        if(!error) emiForm.submit()
        
});


/*
document.getElementById("fdescripcion").addEventListener('keydown', ()=>{
let fdescripcion = "";
let fcontador = 0;
if (document.getElementById("fdescripcion").value != null ) {
    fdescripcion = document.getElementById("fdescripcion").value;
    fcontador = fdescripcion.length;
};
console.log ( "desde Down, desc:" + fdescripcion + "cont:" + fcontador   );


if (fcontador == 25) {
    fdescripcion25 = fdescripcion;
}
}); 

document.getElementById("fdescripcion").addEventListener('keyup', ()=>{
let fdescripcion = document.getElementById("fdescripcion").value;
let fcontador = fdescripcion.length;
console.log ( "desde UP, desc:" + fdescripcion + "cont:" + fcontador   );
if (fcontador > 25) {
    
    document.getElementById("fdescripcionError").innerHTML = "El campo descripcion no puede tener mas de 25 caracteres";
    document.getElementById("fdescripcion").value = fdescripcion25;
    document.getElementById("fcontador").innerHTML = "25/25";
    fdescripcion = fdescripcion25;

} else {

    document.getElementById("fcontador").innerHTML = fcontador+"/25";

}
console.log ( "desde UP, desc:" + fdescripcion + "cont:" + fcontador   );
}); 

*/

});
</script>
</body>
</html>