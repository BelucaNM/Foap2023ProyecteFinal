<?php 

class Producto extends Connection{
    
    private $id;
    private $nombre;
    private $descripcion;
    private $precioUnitario;
    private $URLFoto;
    private $ALTFoto;
    private $categoria;
    private $tablaNombre = "productos";
    private $tablaNumReg = 0;

    public function __construct($id='',$nombre ='',$descripcion='',$URLFoto='',$ALTFoto='',$precioUnitario='',$categoria='')
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->URLFoto = $URLFoto;
        $this->ALTFoto = $ALTFoto;
        $this->precioUnitario = $precioUnitario;
        $this->categoria = $categoria;    
    }

    /**Setters and getters */
    public function getId(){return $this->id;}
    public function getNombre() {return $this->nombre;}
    public function getDescripcion() {return $this->descripcion;}
    public function getURLFoto() {return $this->URLFoto;}
    public function getALTFoto() {return $this->ALTFoto;}
    public function getCategoria() {return $this->categoria;}
    public function getPrecioUnitario() {return $this->precioUnitario;}
    public function setId($id){$this->id = $id;}
    public function setNombre($nombre){$this->nombre = $nombre;}
    public function setDescripcion($descripcion){$this->descripcion = $descripcion;}

    public function setURLFoto($URLFoto){$this->URLFoto = $URLFoto;}
    public function setALTFoto($ALTFoto){$this->ALTFoto = $ALTFoto;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
    public function setCategoria($categoria){$this->categoria = $categoria;}
            

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
            return $stmt->fetch();
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
    
    public function traerUno() {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria
                                                FROM ". $this->tablaNombre."  WHERE pro_id = ?");
            $stmt->execute([$this->id]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
        }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    public function actualizar (){
            
        try {
            $stmt = $this->connect()->prepare("UPDATE ".$this->tablaNombre." SET pro_nombre =?, pro_descripcion=?, 
                                            pro_URLFoto=?, pro_ALTFoto=?, pro_precioUnitario=?, categoriasProductos_cat_id as pro_categoria=? WHERE pro_id=?");
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

}