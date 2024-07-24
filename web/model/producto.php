<?php
class Producto extends Connection{

    private $tablaNombre = "productos";
    private $tablaNumReg = 0;


    public function getTodos() {// para lista de productos
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                    pro_URLFoto, pro_ALTFoto, pro_precioUnitarios
                                            FROM ". $this->tablaNombre);
        $result = $stmt->execute();
        $this->tablaNumReg = $stmt->rowCount();
        return $stmt->fetchAll();
        
    }
        
}


