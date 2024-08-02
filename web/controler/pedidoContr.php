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

};