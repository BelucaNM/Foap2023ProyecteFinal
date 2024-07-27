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


    public function __construct($carritoid='',$fecha ='',$usuarioid='',$total='',$lineaid='',$productoid, $cantidad, $precioUnitario='')
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
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombre." (usuarios_usu_id) VALUES (?)");
            return $stmt->execute([$this->usuarioid]);
            }
        catch (Exception $e){
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
            return $e->getMessage();
            }
    
    }
    
    public function traerLineas() {
        try {
            $stmt = $this->connect()->prepare("SELECT   carritos_car_id, lincar_cantidad,
            lincar_precioUnitario, productos_pro_id
                                            FROM ". $this->tablaNombreLineas. "WHERE carritos_car_id = ?");
            $stmt->execute([$this->carritoid]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    
    public function leer() {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria, pro_fecha
                                                FROM ". $this->tablaNombre."  WHERE pro_id = ?");
            $stmt->execute([$this->id]);
            $this->tablaNumReg = $stmt->rowCount();
            
            $record = $stmt->fetchAll()[0];
            $this->id = $record['pro_id'];
            $this->nombre = $record['pro_nombre'];
            $this->descripcion = $record['pro_descripcion'];
            $this->URLFoto = $record['pro_URLFoto'];
            $this->ALTFoto = $record['pro_ALTFoto'];
            $this->precioUnitario = $record['pro_precioUnitario'];
            $this->categoria = $record['pro_categoria'];
            $this->fecha = $record['pro_fecha'];
            return true;
        }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    
    
    public function eliminarCarrito(){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE car_id=?");
                    $stmt->execute([$this->carritoid]); // debería borrar las lineas en casacada
                 }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }
    

}