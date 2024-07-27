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
    private $tablaNumReg = 0;


    public function __construct($pedidoid='',$fecha ='',$usuarioid='',$total='',$linea='',$productoid, $cantidad, $precioUnitario='')
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

    public function categorias() {
        try {
            $stmt = $this->connect()->prepare("SELECT   cat_id as id, cat_nombre as nombre
                                            FROM categoriasproductos");
            $stmt->execute();
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    public function getNombreCategoria() {
        try {
            $stmt = $this->connect()->prepare("SELECT cat_nombre as nombre
                                            FROM categoriasproductos where cat_id = ?");
            $stmt->execute([$this->categoria]);
            return $stmt->fetch()['nombre'];
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    public function insertarDatos() {
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombre." (pro_nombre, pro_descripcion, 
                                                    pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$this->nombre,$this->descripcion,$this->URLFoto,$this->ALTFoto,$this->precioUnitario,$this->categoria]);
            } 
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        catch (Exception $e){
            echo "Error al insertar datos".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    
    public function traerTodos() {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                    pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria
                                            FROM ". $this->tablaNombre);
            $stmt->execute();
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    public function traerUnaCategoria() {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria
                                                FROM ". $this->tablaNombre."  WHERE categoriasProductos_cat_id = ?");
            echo " categoria= ".$this->categoria;
            $stmt->execute([$this->categoria]);
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
    public function actualizar (){
            
        try {
            $stmt = $this->connect()->prepare("UPDATE ".$this->tablaNombre." SET pro_nombre =?, pro_descripcion=?, 
                                            pro_URLFoto=?, pro_ALTFoto=?, pro_precioUnitario=?, categoriasProductos_cat_id=? WHERE pro_id=?");
            $stmt->execute([$this->nombre,$this->descripcion,  $this->URLFoto, $this->ALTFoto, $this->precioUnitario,
                            $this->categoria, $this->id]);
            }
        catch (Exception $e){
                return $e->getMessage();
            }
    }
    
    public function eliminar(){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE pro_id=?");
                    $stmt->execute([$this->id]);
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