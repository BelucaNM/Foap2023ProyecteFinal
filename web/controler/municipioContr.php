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
    

}