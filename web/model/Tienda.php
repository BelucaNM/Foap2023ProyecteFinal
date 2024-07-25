<?php
class Tienda extends Connection{

    private $tablaNombre = "tiendas";
    private $tablaNumReg = 0;


    public function getTodos() {// para lista de tiendas
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT   tie_id, tie_nombre, tie_direccion, 
                                                    tie_fotoURL, tie_fotoALT, tie_contacto, tie_telefono, municipios_mun_id
                                            FROM ". $this->tablaNombre);
        $result = $stmt->execute();
        $this->tablaNumReg = $stmt->rowCount();
        return $stmt->fetchAll();
        
    }
        
}


