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
    public function setLinea($lineaid){$this->lineaid = $lineaid;}
    public function setproductoid($productoid){$this->productoid = $productoid;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
       

    /***  */

    public function crearCarrito() {

        return $this->insertCarrito($this->usuarioid);
    }
   
    public function añadirAlCarrito() {

        $this->toCarrito($this->carritoid,$this->cantidad,$this->precioUnitario,$this->productoid);
        $this->actualizarCarrito($this->carritoid);
   
    }
    
    public function traerLineas() {

        return $this->getLIneas($this->carritoid);

    
    }
    
    public function recuperaCarrito() {

        $record = $this->getCarrito($this->carritoid);
        if ($record) {
            $this->carritoid = $record['car_id'];
            $this->fecha = $record['car_fecha'];
        }
}
    public function compruebaUserCarrito() {
        try {
            $stmt = $this->connect()->prepare("SELECT   car_id
                                                FROM ". $this->tablaNombre."  WHERE usuarios_usu_id = ?");
            $stmt->execute([$this->usuarioid]);
            if ( $stmt->rowCount() >0) {
                $record = $stmt->fetchAll()[0];
                if ($this->carritoid == $record['car_id']) {
                    return true;
                };
            }
        }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    
    
    public function borrarCarrito(){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE car_id=?");
                $stmt->execute([$this->carritoid]); // debería borrar las lineas en cascada
                return true;
                 }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }
    

}