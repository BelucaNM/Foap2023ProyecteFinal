<?php
class Municipio extends Connection{

    private $tablaNombre = "municipios";
    private $tablaNumReg = 0;


    public function getTodos() {// para selector de municipio desplegable en registro
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT mun_id, mun_codpos, mun_nombre FROM ". $this->tablaNombre);
        $result = $stmt->execute();
        $this->tablaNumReg = $stmt->rowCount();
        return $stmt->fetchAll();
        
    }
    protected function getMunicipioId($codpos='', $nombre=''){
        $existe = false; // devolvera false si el codpos no existe 
        $stmt = $this->connect()->prepare("SELECT mun_id FROM $this->tablaNombre WHERE mun_codpos = ? OR mun_nombre = ?");
        if($stmt->execute(array($codpos, $nombre))){
            if($stmt->rowCount() > 0){
                $existe = $stmt->fetch();
                
            }
        }
        $stmt = null;
        return $existe;
    }
    protected function leeMunicipio($id){
        $mun = false; // devolvera false si el id no existe 
        $stmt = $this->connect()->prepare("SELECT * FROM $this->tablaNombre WHERE mun_id = ?");
        if($stmt->execute(array($id))){
            if($stmt->rowCount() > 0){
                $mun=$stmt->fetch();
                
            }
        }
        $stmt = null;
        return $mun;
    }
        
}


