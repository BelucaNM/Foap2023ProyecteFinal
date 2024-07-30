<?php 

class Carrito extends Connection{
    
    private $carritoid;
    private $fecha;
    private $usuarioid;
    private $total;
    private $lineaid;
    private $productoid;
    private $cantidad;
    private $precioUnitario;

    private $tablaNombre = "carritos";
    private $tablaNombreLineas = "carritoLineas";
    private $tablaNumReg = 0;
    


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

    public function getTablaNumReg() {return $this->tablaNumReg;}
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
        
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombre." (usuarios_usu_id) VALUES (?)");
            $stmt->execute([$this->usuarioid]);
            $this->carritoid = $this->connect()->lastInsertId();
            return $this->carritoid;
            
            }
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        catch (Exception $e){
            echo"Error al insertar datos carrito". $e->getMessage();
            return $e->getMessage();
            }
    
    }
    public function añadirAlCarrito() {
            
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombreLineas." (carritos_car_id, lincar_cantidad,
            lincar_precioUnitario, productos_pro_id) VALUES (?, ?, ?, ?)");
            
            $stmt->execute([$this->carritoid,$this->cantidad,$this->precioUnitario,$this->productoid]);
            
            }
        catch (Exception $e){
            echo $e->getMessage();
            return $e->getMessage();
            }
    
    }
    
    public function traerLineas() {
        try {
            $stmt = $this->connect()->prepare("SELECT  lincar_id, carritos_car_id, lincar_cantidad,
            lincar_precioUnitario, productos_pro_id, pro_nombre, (lincar_precioUnitario*lincar_cantidad) as subtotal
                                            FROM ". $this->tablaNombreLineas. " 
                                            join productos on productos_pro_id = pro_id WHERE carritos_car_id = ?");
            $stmt->execute([$this->carritoid]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    
    public function recuperaCarrito() {
        try {
            $stmt = $this->connect()->prepare("SELECT   car_id, car_fecha
                                                FROM ". $this->tablaNombre."  WHERE usuarios_usu_id = ?");
            $stmt->execute([$this->usuarioid]);
            if ( $stmt->rowCount() >0) {
                $record = $stmt->fetchAll()[0];
                $this->carritoid = $record['car_id'];
                $this->fecha = $record['car_fecha'];
                return true;
            }else{
                return false;
            };
        }
        catch (Exception $e){
            return $e->getMessage();
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
                $stmt->execute([$this->carritoid]); // debería borrar las lineas en casacada
                return true;
                 }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }
    

}