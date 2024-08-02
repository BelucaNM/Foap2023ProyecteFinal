<?php 

class Pedido extends Connection{
    
    private $tablaNombre = "pedidos";
    private $tablaNombreLineas = "pedidoLineas";
    private $tablaNumReg = 0;


    protected function insertPedido($id) {
   
        try {
           
/*         $stmt = $this->connect()->prepare("INSERT INTO pedidos (usuarios_usu_id) VALUES (?);
           SELECT LAST_INSERT_ID() AS id"); */

            $con = $this->connect();
            $stmt = $con->prepare("INSERT INTO ".$this->tablaNombre." (usuarios_usu_id) VALUES (?)");
            $stmt->execute([$id]);

            $stmt = $con->prepare("SELECT LAST_INSERT_ID() AS id");
            $stmt->execute();
            
            $res= $stmt->fetchAll();
            // var_dump ($res);
            return $res[0]['id']; // devuelve el identificador del registro creado
        }
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        catch (Exception $e){
            echo "Error al insertar datos de pedido".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    protected function insertLinea($cantidad,$precioUnitario,$pedidoid,$productoid) {
    /*
        echo "<br>"." en insertarLIneas"."<br>";
        echo "pedidoid=".$this->pedidoid."<br>";
        echo "cantidad=".$this->cantidad."<br>";
        echo "precioUnitario".$this->precioUnitario."<br>";
        echo "productoid".$this->productoid."<br>";
    */
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombreLineas." (lin_cantidad,lin_importe,pedidos_ped_id,productos_pro_id) VALUES (?,?,?,?)");
            return $stmt->execute([$cantidad,$precioUnitario,$pedidoid,$productoid]);
           
} 
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        // el id es autoincremental
        catch (Exception $e){
            echo "Error al insertar datos".$e->getMessage();
            return $e->getMessage();
        }
        
    }
    protected function deletePedido($pedidoid){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE ped_id=?");
                $stmt->execute([$pedidoid]);
                 }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }

    protected function selectPedidosUsuario($usuarioid) {
        try {
            
            $stmt = $this->connect()->prepare("SELECT ped_id, ped_fecha   
                                            FROM ".$this->tablaNombre." WHERE usuarios_usu_id = ?
                                            ORDER BY ped_fecha DESC" );
            $stmt->execute([$usuarioid]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    
            }
    protected function selectLineasPedido($pedidoid) {
        try {
            $stmt = $this->connect()->prepare("SELECT  lin_id, pedidos_ped_id, lin_cantidad,
            lin_importe, productos_pro_id, pro_nombre, (lin_importe*lin_cantidad) as subtotal
                        FROM ". $this->tablaNombreLineas. " 
                    join productos on productos_pro_id = pro_id WHERE pedidos_ped_id = ?");
            $stmt->execute([$pedidoid]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
        }
        catch (Exception $e){
        return $e->getMessage();
        }
            
     }
    protected function selectExistencias($id){

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

};