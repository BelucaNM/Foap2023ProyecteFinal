<?php 

class CarritoContr extends Carrito{
    
    private $carritoid;
    private $fecha;
    private $usuarioid;
    private $total;
    private $lineaid;
    private $productoid;
    private $cantidad;
    private $precioUnitario;


    public function __construct($carritoid='',$fecha ='',$usuarioid='',$total='',$lineaid='',$productoid='', $cantidad='', $precioUnitario='')
    {   $this->carritoid = $carritoid;
        $this->fecha = $fecha;
        $this->usuarioid = $usuarioid;
        $this->total = $total;
        $this->lineaid = $lineaid;
        $this->productoid = $productoid;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
        
            
    }

    /**Setters and getters */
    public function getCarritoId(){return $this->carritoid;}
    public function getFecha() {return $this->fecha;}
    public function getusuarioid() {return $this->usuarioid;}
    public function getTotal() {return $this->total;}
    public function getLineaid() {return $this->lineaid;}
    public function getProductoid() {return $this->productoid;}
    public function getCantidad() {return $this->cantidad;}
    public function getPrecioUnitario() {return $this->precioUnitario;}

    
    public function setCarritoId($id){$this->carritoid = $id;}
    public function setFecha($fecha){$this->fecha = $fecha;}
    public function setusuarioid($usuarioid){$this->usuarioid = $usuarioid;}
    public function setTotal($total){$this->total = $total;}
    public function setLineaid($lineaid){$this->lineaid = $lineaid;}
    public function setproductoid($productoid){$this->productoid = $productoid;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
       

    /***  */

    public function crearCarrito() {
        $this->carritoid = $this->insertCarrito($this->usuarioid);
    
    }
   
    public function añadirAlCarrito() {

        $res = $this->alCarrito($this->carritoid,$this->cantidad,$this->precioUnitario,$this->productoid);
        if(!$res){
//          echo "error en al-carrito";
            header("Location: ../view/verProductoExistencias.php?error=FailedStmt");
            exit();
        }else{
//          echo "linea de carrito generada con exito";
            header("Location: ../view/verProductos.php?info=carro");
            exit();
        };
    
    }
    
    public function traerLineas() {
        return $this->getLineas($this->carritoid);
    
    }
    
    public function recuperaCarrito() {

        $record = $this->getCarrito($this->usuarioid);
        if (!$record) {
            return false ;
        }else{
            $this->carritoid = $record['car_id'];
            $this->fecha = $record['car_fecha'];
            return true;
        }
}
    public function compruebaUserCarrito() {
        $res = false;
        $record = $this->getCarrito($this->usuarioid);
        if ($record) {
            if ($this->carritoid == $record['car_id']) {
                    $res = true;
                };
            }
        return $res;
        
    }
    public function borrarCarrito(){
        return $this->deleteCarrito($this->carritoid);
           
    }
    public function borrarLineaCarrito(){
        return $this->deleteLineaCarrito($this->lineaid);
           
    }
    

}