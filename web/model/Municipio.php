<?php
class Municipio extends Connection{

    private $tablaNombre = "municipios";
    private $tablaNumReg = 0;


    protected function creaSelCPostal() {// para selector de municipio desplegable en registro
        $error = 0;
        $stmt = " municipios ORDER BY id LIMIT 40";
       
        $stmt = $this->connect()->prepare("SELECT mun_id, mun_codpos, mun_nombre FROM ". $this->tablaNombre);
        $result = $stmt->execute();
        $this->tablaNumReg = $stmt->rowCount();
        return $stmt->fetchAll();
        
    }
        
}


