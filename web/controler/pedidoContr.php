<?php 
class PedidoContr extends Pedido{
    
    private $pedidoid;
    private $fecha;
    private $usuarioid;
    private $total;
    private $linea;
    private $productoid;
    private $cantidad;
    private $precioUnitario;
    private $formatoinvoice_php;
    private $emailclie;
    private $nomclie;


    public function __construct($pedidoid='',$fecha ='',$usuarioid='',$total='',$linea='',$productoid='', $cantidad='', $precioUnitario='')
    {   $this->pedidoid = $pedidoid;
        $this->fecha = $fecha;
        $this->usuarioid = $usuarioid;
        $this->total = $total;
        $this->linea = $linea;
        $this->productoid = $productoid;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
    }

    /**Setters and getters */
    public function getPedidoid(){return $this->pedidoid;}
    public function getFecha() {return $this->fecha;}
    public function getusuarioid() {return $this->usuarioid;}
    public function getproductoid() {return $this->productoid;}
    public function getCantidad() {return $this->cantidad;}
    public function getPrecioUnitario() {return $this->precioUnitario;}

    public function setPedidoId($pedidoid){$this->pedidoid = $pedidoid;}
    public function setFecha($fecha){$this->fecha = $fecha;}
    public function setusuarioid($usuarioid){$this->usuarioid = $usuarioid;}
    public function setproductoid($productoid){$this->productoid = $productoid;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
       

    public function getformatoInvoice_php() {
        return $this->formatoinvoice_php;
        }
    public function setformatoInvoice_php($formatoinvoice_php) {
        $this->formatoinvoice_php = $formatoinvoice_php;
        }   
    /****/

    
    public function crearPedido() {

        $this->pedidoid = $this->insertPedido($this->usuarioid) ;       
    }

    public function crearLinea() {
    /*
        echo "<br>"." en insertarLIneas"."<br>";
        echo "pedidoid=".$this->pedidoid."<br>";
        echo "cantidad=".$this->cantidad."<br>";
        echo "precioUnitario".$this->precioUnitario."<br>";
        echo "productoid".$this->productoid."<br>";
    */
        return $this->insertLinea($this->cantidad,$this->precioUnitario,$this->pedidoid,$this->productoid);
                
    }
    public function eliminar(){
        
        $result = $this->deletePedido($this->pedidoid);
            
    }

    public function traerTodos() {

        return $this->selectPedidosUsuario($this->usuarioid);
    }
    public function traerLineas() {
        
        return $this->selectLineasPedido($this->pedidoid);           
     }
    public function getExistencias(){
        
        return $this->selectExistencias($this->productoid);
      
    }

    public function consultaLineas() {// revisar

        $result = $this->selectLineasPedido();
        
        if ($result[0] == 1) {
                echo " Ejecución stmt incorrecta";
                header ("location: ../view/verPedidos.php?error=FailedStmt");
                exit();
                }
        if ($result[0] == 2) { 
                echo " El pedido no tiene lineas";
                header ("location: ../views/verPedidos.php?error=noOrderLines"); 
                exit();
                }
        return $result[1];
        }

public function consultaPedido() {// revisar

        $result = $this->selectPedido();

        if ($result[0] == 1) {
                echo " Ejecución stmt incorrecta";
                header ("location: ../views/verPedidos.php?error=FailedStmt");
                exit();
                }
        if ($result[0] == 2) { 
                echo " El pedido no corresponde a ningun cliente actual";
                header ("location: ../views/verPedidos.php?error=noRefCostumer"); 
                exit();
                }
//        print_r($result);

        $this->setdatacomanda($result[1]['datacomanda']);
        $this->setnumClie($result[1]['numclie']); 
        $this->setnomclie($result[1]['nomclie']);
        $this->setemailClie($result[1]['emailclie']);
        $this->setnumemp($result[1]['numemp']);
        $this->setnomemp($result[1]['nomven']);
        $this->setimportTotal($result[1]['importtotal']);
        return $result[1];
}
    
    public function creaInvoice(){

        $pedido = $this->consultaPedido();
//                print_r($pedido);
        $lineas = $this->consultaLineas();
//                print_r($lineas);

        // The Composer autoloader
        
        require_once '../../lib/dompdf/vendor/autoload.php';
        // Reference the Dompdf namespace
        //use Dompdf\Dompdf; 
        // Instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();

        ob_start();

        include '../includes/invoice.php'; // si es dinámica , para que el PHP sea interpretado                
//      include '$this->formatoinvoice_php'; // si es dinámica , para que el PHP sea interpretado


        $html_file = ob_get_contents();
        ob_end_clean();

        // Load HTML content to generate a PDF

        //$dompdf->loadHtml('<h1 style="color:blue;">AllPHPTricks.com3</h1>');
        // $html_file = file_get_contents("factura.html"); // para contenido estatico
        $dompdf->loadHtml($html_file);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();

        // Devuelve el archivo PDF en forma de cadena.
        $pdf_string = $dompdf->output(); 
        // Nombre y ubicación del archivo PDF
        $pdf_file_loc = '../invoicesPDF/'.$this->getnumcomanda().'.pdf';
        // Guardar el PDF generado en la ubicación deseada con un nombre personalizado
        file_put_contents($pdf_file_loc, $pdf_string);
        //echo ' despues de "contents"';

        // Download the generated PDF
        // $dompdf->stream()
        // $dompdf->stream("test", array("Attachment" => 1, "compress" => 0));
        //echo ' despues de "stream"';
               
        //enviar el pdf por email
        $this->enviaEmail();
        

}
public function enviaEmail(){
    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;*/
        
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
                    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    //        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPAuth = true;
    $mail->Username = 'foap408@gmail.com';
    $mail->Password = 'dyrv alyq ojiq acyd';
                    
    $mail->addAddress($this->emailclie,$this->nomclie);
    //      $mail->addAddress('beluca.navarrina@gmail.com', 'Beluca');
    $mail->Subject = "Su factura Foap2023-OOP";
        
    //Replace the plain text body with one created manually
    //Para enviar texto plano     
                    
    $mail->Body = "Hola ".$this->nomclie.", Adjunto su factura correspondienta a su pedido ". $this->getnumcomanda() .".\n\Atentamente,\n\nFoap2023-OOP";
    $mail->addAttachment('../invoicesPDF/'.$this->getnumcomanda().'.pdf');
        
    $err = $mail->send();
    if (!$err) {
            // echo 'Mailing Error: ' . $mail->ErrorInfo;
            header("Location: ../views/verPedidos.php?error=MailError");
            exit();
    }else{
            header("Location: ../views/verPedidos.php?error=MailSent");
            exit();       
    };
    }
};