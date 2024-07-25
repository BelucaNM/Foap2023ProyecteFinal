<?php 

class TiendaContr extends Tienda{
    private $id;
    private $nombre;
    private $direccion;
    private $URLFoto;
    private $ALTFoto;
    private $telefono;
    private $mun_id;
    private $ven_id;


    public function __construct($id='',$nombre ='',$direccion='',$URLFoto='',$ALTFoto='',$contacto='',$mun_id='', $ven_id='')
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->contacto = $contacto;
        $this->URLFoto = $URLFoto;
        $this->ALTFoto = $ALTFoto;
        $this->mun_id = $mun_id;
        $this->ven_id = $ven_id;
    }

    /**Setters and getters */
    
    /*** Terminar */

    private function emptyInput($input){
        $result = false;
        if(empty($input)){ $result = true;}
        return $result;
    }

    

}