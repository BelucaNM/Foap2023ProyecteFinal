<?php 

class MunicipioContr extends Municipio{
    private $id;
    private $codpos;
    private $nombre;
    
    

    public function __construct($codpos='', $nombre='', $id= ''  )
    {   $this->codpos = $codpos;
        $this->nombre = $nombre;
        $this->id = $id;
        
    }

    /**Setters and getters */
    public function setId($id){
        $this->id = $id;
        }
    public function getId(){
        return $this->id;
        }
    public function setCodpos($codpos){
        $this->codpos = $codpos;
        }
    public function getCodpos(){
        return $this->codpos;
        }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
        }

    
    /*** Terminar */

    private function emptyInput($input){
        $result = false;
        if(empty($input)){ $result = true;}
        return $result;
    }
    public function checkMunicipio(){
        $this->id = $this->getMunicipioId($this->codpos, $this->nombre);
        return $this->id; 
    }
    public function traerMunicipio(){
        $existe=$this->leeMunicipio($this->id);
        $this->codpos = $existe['mun_codpos'];
        $this->nombre = $existe['mun_nombre'];
    }

}