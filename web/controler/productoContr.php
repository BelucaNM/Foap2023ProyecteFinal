<?php 

class ProductoContr extends Producto{
    private $id;
    private $nombre;
    private $descripcion;
    private $precioUnitario;
    private $URLFoto;
    private $ALTFoto;

    
    

    public function __construct($id='',$nombre ='',$descripcion='',$precioUnitario='',$URLFoto='',$ALTFoto='' )
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precioUnitario = $precioUnitario;
        $this->URLFoto = $URLFoto;
        $this->ALTFoto = $ALTFoto;   
    }

    /**Setters and getters */
    
    /*** Terminar */

    private function emptyInput($input){
        $result = false;
        if(empty($input)){ $result = true;}
        return $result;
    }

    

}