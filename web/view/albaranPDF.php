<?php
echo "hola";
if (($_SERVER['REQUEST_METHOD'] === 'GET') && isset($_GET['numcomanda']) ){

    $numcomanda = $_GET["numcomanda"];
    echo 'Creando instancia de pedido <br>';
    require "../model/Connection.php";
    require "../model/Pedido.php";
    require "../controler/pedidoContr.php";
    $pedidoContr= new PedidoContr($numcomanda);
    

    // Consulta datos Pedido
    $pedido = $pedidoContr->consultaPedido();
    print_r($pedido);
    
    $lineas = $pedidoContr->consultaLineas();
     print_r($lineas);
    
    require "../model/Usuario.php";
    require "../controler/usuarioContr.php";

    //Consulta datos cliente
    $usuarioContr = new UsuarioContr();
    $usuarioContr->setId($pedido[0]['usuarios_usu_id']);
    $usuarioContr->leerUser();

    $apellido =$usuarioContr->getApellido();
    $nombre =$usuarioContr->getNombre();
    $direccion =$usuarioContr->getDireccion();
    $dni =$usuarioContr->getDni();
    $email =$usuarioContr->getEmail();
    $mun_id =$usuarioContr->getMunicipio(); 

    require "../model/Municipio.php";
    require "../controler/municipioContr.php";
    $municipioContr = new MunicipioContr("","",$mun_id);
    $municipioContr->traerMunicipio();
    $muncodpos = $municipioContr->getCodpos();
    $munnombre = $municipioContr->getNombre();

    // Crea Albaran
        
    require_once '../../lib/dompdf/vendor/autoload.php';
    $dompdf = new Dompdf\Dompdf();
     ob_start();
    include '../includes/invoice.php'; // si es dinámica , para que el PHP sea interpretado                

    $html_file = ob_get_contents();
    ob_end_clean();
    $dompdf->loadHtml($html_file);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $pdf_string = $dompdf->output(); 
    $pdf_file_loc = '../invoicesPDF/'.$numcomanda.'.pdf';
    file_put_contents($pdf_file_loc, $pdf_string);
    
    
    // Download the generated PDF
    // $dompdf->stream()
    // $dompdf->stream("test", array("Attachment" => 1, "compress" => 0));
    //echo ' despues de "stream"';

   // Envia email
   
    $err = $usuarioContr->enviaEmail('factura',$numcomanda);
    
    if (!$err) {
        header("Location: ../view/verPedidos.php?error=MailSent");
        exit();
    }else{
        header("Location: ../view/verPedidos.php?error=MailError");
        exit();       
    };
    
}
?>