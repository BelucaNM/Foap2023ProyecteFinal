
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

<?php 
$title="Carrito";
$soy = "carrito";
include "../includes/header.php"; 

if (!isset ($_SESSION['user'])){
        header("Location: ../view/bienvenida.php");
        // " No es posible comprar sin estar identificado";
        exit();
}
include "../includes/verCarrito-inc.php";
?>
<section id="cuerpoPagina" class="section">
<div class="cards-container mt-3">
        <table class="table table-striped" id="carrito">
        <thead>
            <tr>
                    
                <th scope="col">#Carrito</th>
                <th scope="col">Fecha</th>
                <th scope="col">#Productos</th>
                <th scope="col">Acciones</th>
   
            </tr>
        </thead>
        <tbody>
            <tr>
                    
            <td scope= 'row'><?=$carrito->getCarritoId();?></td>
            <td><?=$carrito->getFecha();?></td>
            <td id='numReg'><?=$carrito->getTablaNumReg();?></td>
            <td>  
                        <a href='../includes/pedido-inc.php?id=<?=$carrito->getCarritoId();?>'>Hacer Pedido</a> 
                        <a href='#' onclick='javascript:borraCarrito(<?=$carrito->getCarritoId();?>)'>Borrar carrito</a>   
            </td>
        </tr>
        </tbody>
        
</div>
<div>
     
    <table class = 'table table-striped' id="tlineasCarrito">
        <thead>
            <tr>
                <th scope="col">LineaId</th>
                <th scope="col">ProductoId</th>
                <th scope="col">ProductoNombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">PrecioUnitario</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineas as $key => $linea){
                echo "<tr id=".$linea['lincar_id'].">";
                echo "<td>".$linea['lincar_id']."</td>";
                echo "<td>".$linea['productos_pro_id']."</td>";
                echo "<td>".$linea['pro_nombre']."</td>";
                echo "<td>".$linea['lincar_cantidad']."</td>";
                echo "<td>".$linea['lincar_precioUnitario']."</td>";
                echo "<td>".$linea['subtotal']."</td>";
//                echo "<td id='".$linea['lincar_id']."' ><a  href='#' onclick='javascript:borraFila(this);'><span class='icoBasu'>&#128465;</span></a></td>"; 
                echo "<td id='".$linea['lincar_id']."' ><a  href='#' onclick='javascript:borraFila(this);'><i class='bi bi-trash'></i></a></td>";                       
                echo "</tr>";
                $total += $linea['subtotal'];

                }
                $carrito->setTotal($total);
            ?>
        </tbody>
    </table>
</div>
<dialog id="wmodal" close>
            <form method="dialog">
              <section>
                <p> Confirme el borrado : </p>
              </section>
              <menu>
                <button id="cancelBoton"  type="reset">Cancel</button>
                <button id="confirmBoton" type="submit">Confirm</button>
              </menu>
            </form>
        </dialog>
</section>


<?php include "../includes/footer.php"; ?> 

<script>
function borraFila(laRef) {

    var wmodal = document.getElementById("wmodal");
    console.log ( wmodal);
    wmodal.showModal();
    if (!wmodal.open) { 
                console.log("Dialog close");
                wmodal.open();
    } else {
                console.log("Dialog is open");
    };

    console.log(laRef);
    let laFila = laRef.parentElement.parentElement;
    
    // lanza escuchas sobre los botones 
    var cancelButton = document.getElementById("cancel");
    var confirmButton = document.getElementById("confirm");
            
    // Form cancelBoton cierra la caja de dialogo
    cancelBoton.addEventListener("click", function () {
                wmodal.close();},{once:true});

    // Form confirmBoton borra la linea de carrito en view y BD
    confirmBoton.addEventListener("click", function () {
                
        let idLinea = laFila.id;
        let elTDNumReg = document.getElementById('numReg');
        let elNumReg = parseInt(elTDNumReg.innerHTML);
        const data = {"id": idLinea};
        dataSon = JSON.stringify(data);
        console.log (dataSon);

        const enviar = async () => {
            try {
                let response = await fetch("../includes/borraLineaCarrito.php", {
                            method: "POST",
                            cache: "no-cache",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(data)
                        });
                if (response.ok) {
                    console.log(response);
                    laFila.remove();
                    elTDNumReg.innerHTML = --elNumReg;
                    } 
                } 
            catch (err) {
                        console.log("Error al realizar la petición AJAX: " + err.message);
                    }
                }
       
        enviar();
    }, {once:true});
      
 };
 function borraCarrito(idRef) { 

    var wmodal = document.getElementById("wmodal");
    console.log ( wmodal);
    wmodal.showModal();
    if (!wmodal.open) { 
        console.log("Dialog close");
        wmodal.open();
    }else{
        console.log("Dialog is open");
    };
        
    console.log(idRef);
           
            
    // lanza escuchas sobre los botones 
    var cancelButton = document.getElementById("cancel");
    var confirmButton = document.getElementById("confirm");
                    
    // Form cancelBoton cierra la caja de dialogo
    cancelBoton.addEventListener("click", function () {
        wmodal.close();},{once:true});
        
    // Form confirmBoton borra la linea de carrito en view y BD
        confirmBoton.addEventListener("click", function () {
                        
            const data = {"id": idRef};
            dataSon = JSON.stringify(data);
            console.log (dataSon);
        
            const enviar = async () => {
                try {
                let response = await fetch("../includes/borraCarrito.php", {
                    method: "POST",
                    cache: "no-cache",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(data)
                    });
                    if (response.ok) {
                    console.log(response);
                    window.location.assign ("../view/verProductos.php");
                        } 
                    } 
             catch (err) {
                    console.log("Error al realizar la petición AJAX: " + err.message);
                    }
             }
               
            enviar();
            }, {once:true});
              
         };            
            
</script>
       
</body>
</html>