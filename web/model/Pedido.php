<?php 

class Pedido extends Connection{
    
    private $pedidoid;
    private $fecha;
    private $usuarioid;
    private $total;
    private $linea;
    private $productoid;
    private $cantidad;
    private $precioUnitario;

    private $tablaNombre = "pedidos";
    private $tablaNombreLineas = "pedidoLineas";
    private $tablaNumReg = 0;


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
    public function getId(){return $this->pedidoid;}
    public function getFecha() {return $this->fecha;}
    public function getusuarioid() {return $this->usuarioid;}
    public function getproductoid() {return $this->productoid;}
    public function getCantidad() {return $this->cantidad;}
    public function getPrecioUnitario() {return $this->precioUnitario;}

    public function setId($id){$this->pedidoid = $id;}
    public function setFecha($fecha){$this->fecha = $fecha;}
    public function setusuarioid($usuarioid){$this->usuarioid = $usuarioid;}
    public function setproductoid($productoid){$this->productoid = $productoid;}
    public function setCantidad($cantidad){$this->cantidad = $cantidad;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
       

    /***  */

    
    public function crearPedido() {
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombre." (`usuarios_usu_id`) VALUES (?);SELECT LAST_INSERT_ID() AS id;");
            $stmt->execute([$this->usuarioid]);
            $this->pedidoid = $this->connect()->lastInsertId();
            return $this->pedidoid; 
           }  
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        catch (Exception $e){
            echo "Error al insertar datos".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    public function insertarLinea() {
        echo "pedidoid=".$this->pedidoid."<br>";
        echo "cantidad=".$this->cantidad."<br>";
        echo "precioUnitario".$this->precioUnitario."<br>";
        echo "productoid".$this->productoid."<br>";

        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombreLineas." ('lin_cantidad', 'lin_importe', 'pedidos_ped_id', 'productos_pro_id') VALUES (?,?,?,?)");
            $stmt->execute([$this->cantidad,$this->precioUnitario,$this->pedidoid,$this->productoid]);
            } 
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        // el id es autoincremental
        catch (Exception $e){
            echo "Error al insertar datos".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    public function eliminar(){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE ped_id=?");
                    $stmt->execute([$this->pedidoid]);
                 }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }
    public function getExistencias(){

        try {
            $stmt = $this->connect()->prepare("select productos_pro_id, tiendas_tie_id, exi_cantidad, tie_nombre, tie_telefono, vendedores_ven_id, ven_username 
            from existencias join tiendas on tie_id=tiendas_tie_id 
            join vendedores on vendedores_ven_id = ven_id
            where productos_pro_id = ?");
                
            $stmt->execute([$this->id]);
            return $stmt->fetchAll();
             }
        catch (Exception $e){
                return $e->getMessage();
            }
    }

}