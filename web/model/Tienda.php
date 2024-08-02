<?php
class Tienda extends Connection{

    private $tablaNombre = "tiendas";
    private $tablaNumReg = 0;

    
    

    protected function getTodos() {// para lista de tiendas
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
    protected function getTienda($id) {// 
        try {

        $stmt = $this->connect()->prepare("SELECT   tie_id, tie_nombre, tie_direccion, tie_fotoURL, tie_fotoALT, tie_telefono, 
                                    mun_codpos, mun_nombre, vendedores_ven_id, vendedores.ven_username, vendedores.ven_email 
                                            FROM ". $this->tablaNombre."  
                                                join vendedores on vendedores_ven_id = ven_id  
                                                join municipios on municipios_mun_id = mun_id where tie_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll()[0];
         

    }
    catch (Exception $e){
        return $e->getMessage();
        }
    
    }
        
}


