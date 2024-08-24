<?php 

class Producto extends Connection{
    

    private $tablaNombre = "productos";
    private $tablaNumReg = 0;

    

    protected function getCategorias() {
        try {
            $stmt = $this->connect()->prepare("SELECT   cat_id as id, cat_nombre as nombre
                                            FROM categoriasproductos");
            $stmt->execute();
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    protected function getNombreCategoria($id) {
        try {
            $stmt = $this->connect()->prepare("SELECT cat_nombre as nombre
                                            FROM categoriasproductos where cat_id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch()['nombre'];
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    protected function insertDatos($nombre,$descripcion,$URLFoto,$ALTFoto,$precioUnitario,$categoria,$ubicacion) {
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombre." (pro_nombre, pro_descripcion, 
                                                    pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id,pro_ubicacion) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$nombre,$descripcion,$URLFoto,$ALTFoto,$precioUnitario,$categoria,$ubicacion]);
            } // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        
        catch (Exception $e){
            echo "Error al insertar datos".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    
    protected function getTodos() {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, 
                                                        categoriasProductos_cat_id as pro_categoria, 
                                                        cat_nombre,
                                                        pro_fecha,
                                                        pro_ubicacion
                                            FROM ".$this->tablaNombre." 
                                            JOIN categoriasproductos ON categoriasProductos_cat_id = cat_id 
                                            ORDER BY pro_nombre,pro_precioUnitario" );
            $stmt->execute();
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
    }
    protected function getUnaCategoria($id) {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria,
                                                        cat_nombre,
                                                        pro_fecha,pro_ubicacion
                                                FROM ". $this->tablaNombre."  
                                                JOIN categoriasproductos ON categoriasProductos_cat_id = cat_id 
                                                WHERE categoriasProductos_cat_id = ? ORDER BY pro_nombre,pro_precioUnitario ");
            //echo " categoria= ".$id;
            $stmt->execute([$id]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    protected function getProductosCon($texto) {
        try {
                
            $sql ="SELECT   pro_id, pro_nombre, pro_descripcion, 
                pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria,
                cat_nombre,
                pro_fecha,pro_ubicacion
                FROM ". $this->tablaNombre."  
                JOIN categoriasproductos ON categoriasProductos_cat_id = cat_id 
                WHERE 1 ";
                        
            foreach(explode(' ',$texto) as $termino){
                 $sql.=" AND  ( pro_nombre LIKE '%".$termino."%' OR cat_nombre LIKE '%".$termino."%' OR pro_descripcion LIKE '%".$termino."%')";
                };
                        
            $sql.= " ORDER BY pro_nombre,pro_precioUnitario ";
            $stmt = $this->connect()->prepare($sql);
            
            $stmt->execute();
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    
    protected function leerDatos($id) {
        try {
            $stmt = $this->connect()->prepare("SELECT   pro_id, pro_nombre, pro_descripcion, 
                                                        pro_URLFoto, pro_ALTFoto, pro_precioUnitario, categoriasProductos_cat_id as pro_categoria, 
                                                        pro_fecha,pro_ubicacion
                                                FROM ". $this->tablaNombre."  WHERE pro_id = ?");
            $stmt->execute([$id]);           
            return $stmt->fetchAll()[0];

        }
        catch (Exception $e){
            return $e->getMessage();
            }
        
    }
    protected function actualizarDatos ($nombre,$descripcion,$URLFoto, $ALTFoto, $precioUnitario,
                                        $categoria, $ubicacion, $id){
        try {
            $stmt = $this->connect()->prepare("UPDATE ".$this->tablaNombre." SET pro_nombre =?, pro_descripcion=?, 
                                            pro_URLFoto=?, pro_ALTFoto=?, pro_precioUnitario=?, categoriasProductos_cat_id=?, pro_ubicacion = ? WHERE pro_id=?");
            $stmt->execute([$nombre,$descripcion,  $URLFoto, $ALTFoto, $precioUnitario,
                            $categoria, $ubicacion, $id]);
            return true;
            }
        catch (Exception $e){
                return $e->getMessage();
            }
    }
    
    protected function eliminarDatos($id){
            
        try {
            $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE pro_id=?");
            $stmt->execute([$id]);
                }
        catch (Exception $e){
                return $e->getMessage();
            }
    }
    protected function getExistencias($id){

        try {
            $stmt = $this->connect()->prepare("select productos_pro_id, tiendas_tie_id, exi_cantidad, tie_nombre, tie_telefono, vendedores_ven_id, ven_username 
            from existencias join tiendas on tie_id=tiendas_tie_id 
            join vendedores on vendedores_ven_id = ven_id
            where productos_pro_id = ?");
                
            $stmt->execute([$id]);
            return $stmt->fetchAll();
             }
        catch (Exception $e){
                return $e->getMessage();
            }
    }
    protected function updateExistencias($id,$operacion,$n){


        try {
            if ($operacion == 'suma') {
                $stmt = $this->connect()->prepare("UPDATE existencias SET exi_cantidad = exi_cantidad  + ? 
                where tiendas_tie_id = ? and productos_pro_id = ?");}
            
            else {if ($operacion == 'resta') {
                $stmt = $this->connect()->prepare("UPDATE existencias SET exi_cantidad = exi_cantidad  - ? 
                where tiendas_tie_id = ? and productos_pro_id = ?");}
            }
           
            $stmt->execute([$n,2,$id]); // la tienda id=2 es el almacen ahora
            return true;
             }
        catch (Exception $e){
            return $e->getMessage();
            }
    }
    

}