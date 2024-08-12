<?php 
class ProductoContr extends Producto{
    
    private $id;
    private $nombre;
    private $descripcion;
    private $precioUnitario;
    private $URLFoto;
    private $ALTFoto;
    private $categoria;
    private $fecha;
    private $ubicacion;


    public function __construct($id='',$nombre ='',$descripcion='',$URLFoto='',$ALTFoto='',$precioUnitario='',$categoria='',$fecha='',$ubicacion='')
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->URLFoto = $URLFoto;
        $this->ALTFoto = $ALTFoto;
        $this->precioUnitario = $precioUnitario;
        $this->categoria = $categoria;
        $this->categoria = $fecha; 
        $this->ubicacion = $ubicacion;     
    }

    /**Setters and getters */
    public function getId(){return $this->id;}
    public function getNombre() {return $this->nombre;}
    public function getDescripcion() {return $this->descripcion;}
    public function getURLFoto() {return $this->URLFoto;}
    public function getALTFoto() {return $this->ALTFoto;}
    public function getCategoria() {return $this->categoria;}
    public function getPrecioUnitario() {return $this->precioUnitario;}
    public function getFecha() {return $this->fecha;}
    public function getUbicacion() {return $this->ubicacion;}
    public function setId($id){$this->id = $id;}
    public function setNombre($nombre){$this->nombre = $nombre;}
    public function setDescripcion($descripcion){$this->descripcion = $descripcion;}
    public function setURLFoto($URLFoto){$this->URLFoto = $URLFoto;}
    public function setALTFoto($ALTFoto){$this->ALTFoto = $ALTFoto;}
    public function setPrecioUnitario($precioUnitario){$this->precioUnitario = $precioUnitario;}
    public function setCategoria($categoria){$this->categoria = $categoria;}
    public function setFecha($fecha){$this->fecha = $fecha;}  
    public function setUbicacion($ubicacion){$this->ubicacion = $ubicacion;}         

    public function categorias(){
        return $this->getCategorias();
    }
    public function nombreCategoria() {
        return $this->getNombreCategoria($this->categoria);
    }
    public function insertarDatos()  {
        $this->insertDatos( $this->nombre,$this->descripcion,$this->URLFoto,
                            $this->ALTFoto,$this->precioUnitario,$this->categoria,$this->ubicacion);
    }
    public function traerTodos()  {
        return $this->getTodos();
    }
    public function traerUnaCategoria() {
        return $this->getUnaCategoria($this->categoria);
    }
    public function traerCon($texto) {
        return $this->getProductosCon($texto);
    }

    public function leer() {
        $record= $this->leerDatos($this->id);
        if ($record){
            $this->id = $record['pro_id'];
            $this->nombre = $record['pro_nombre'];
            $this->descripcion = $record['pro_descripcion'];
            $this->URLFoto = $record['pro_URLFoto'];
            $this->ALTFoto = $record['pro_ALTFoto'];
            $this->precioUnitario = $record['pro_precioUnitario'];
            $this->categoria = $record['pro_categoria'];
            $this->fecha = $record['pro_fecha'];
            $this->ubicacion = $record['pro_ubicacion'];
            return true;
        }
        return false;
    }
    public function actualizar () {
        $this->actualizarDatos( $this->nombre,$this->descripcion,  $this->URLFoto, $this->ALTFoto, $this->precioUnitario,
                                $this->categoria, $this->ubicacion, $this->id);

    }
    public function eliminar() {
        $this->eliminarDatos($this->id);
    }
    public function leerExistencias() {
        return $this->getExistencias($this->id);

    }
    public function actualizarExistencias() {}

}

?>
