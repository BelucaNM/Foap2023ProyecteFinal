<?php
class Tienda extends Connection{

    private $tablaNombre = "tiendas";
    private $tablaNumReg = 0;

    private $id;
    private $nombre;
    private $direccion;
    private $URLFoto;
    private $ALTFoto;
    private $telefono;
    private $codpos;
    private $municipio;
    private $ven_id;
    private $ven_username;
    private $ven_email;

    public function __construct($id='',$nombre ='',$direccion='',$URLFoto='',$ALTFoto='',$telefono='',$codpos='',$ven_id='',$ven_username='',$ven_email='')
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->URLFoto = $URLFoto;
        $this->ALTFoto = $ALTFoto;
        $this->telefono = $telefono;
        $this->codpos = $codpos;
        $this->ven_id = $ven_id;
        $this->ven_username = $ven_username;
        $this->ven_email = $ven_email;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId($id){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getCodpos(){
        return $this->codpos;
    }
    public function getALTFoto(){
        return $this->ALTFoto;
    }
    public function getURLFoto(){
        return $this->URLFoto;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getMunicipio(){
        return $this->municipio;
    }
    public function getVen_id(){
        return $this->ven_id;
    }
    public function getVen_username(){
        return $this->ven_username;
    }
    public function getVen_email(){
        return $this->ven_email;
    }



    public function getTodos() {// para lista de tiendas
        try {
        $stmt = $this->connect()->prepare("SELECT   tie_id, tie_nombre, tie_direccion, tie_fotoURL, tie_fotoALT, tie_telefono, 
                                    mun_codpos, mun_nombre, vendedores_ven_id, vendedores.ven_username, vendedores.ven_email 
                                            FROM ". $this->tablaNombre."  
                                            join vendedores on vendedores_ven_id = ven_id  
                                            join municipios on municipios_mun_id = mun_id");
        $result = $stmt->execute();
        $this->tablaNumReg = $stmt->rowCount();
        return $stmt->fetchAll();
    }
    catch (Exception $e){
        return $e->getMessage();
        }
        
    }
    public function leer() {// 
        try {

        $stmt = $this->connect()->prepare("SELECT   tie_id, tie_nombre, tie_direccion, tie_fotoURL, tie_fotoALT, tie_telefono, 
                                    mun_codpos, mun_nombre, vendedores_ven_id, vendedores.ven_username, vendedores.ven_email 
                                            FROM ". $this->tablaNombre."  
                                                join vendedores on vendedores_ven_id = ven_id  
                                                join municipios on municipios_mun_id = mun_id where tie_id = ?");
        $stmt->execute([$this->id]);
        $record = $stmt->fetchAll()[0];
    //    print_r($record);
        $this->id = $record['tie_id'];
        $this->nombre = $record['tie_nombre'];
        $this->direccion = $record['tie_direccion'];
        $this->URLFoto = $record['tie_fotoURL'];
        $this->ALTFoto = $record['tie_fotoALT'];
        $this->telefono = $record['tie_telefono'];
        $this->codpos = $record['mun_codpos'];
        $this->municipio = $record['mun_nombre'];
        $this->ven_id = $record['vendedores_ven_id'];
        $this->ven_username = $record['ven_username'];
        $this->ven_email = $record['ven_email'];

        return true;
    }
    catch (Exception $e){
        return $e->getMessage();
        }
    
    }
        
}


