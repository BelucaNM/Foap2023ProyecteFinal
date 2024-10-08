<?php 

class Carrito extends Connection{
    
    

    private $tablaNombre = "carritos";
    private $tablaNombreLineas = "carritolineas";
    protected $tablaNumReg = 0;
    
    public function getTablaNumReg(){return $this->tablaNumReg;}

    Protected function insertCarrito($usuarioid) {
        
        try {

            $con = $this->connect();
            
            $stmt = $con->prepare("INSERT INTO ".$this->tablaNombre." (usuarios_usu_id) VALUES (?)");
            $stmt->execute([$usuarioid]);

            $stmt = $con->prepare("SELECT LAST_INSERT_ID() AS id");
            $stmt->execute();
            $res= $stmt->fetchAll();
            var_dump ($res);
            return $res[0]['id']; // devuelve el identificador del registro creado
                        
            }
        // la fecha de de alta/modificació de datos se actualiza en MySql a current_timestamp
        catch (Exception $e){
            echo"Error al insertar datos carrito". $e->getMessage();
            return $e->getMessage();
            }
    
    }
    Protected function alCarrito($carritoid,$cantidad,$precioUnitario,$productoid) {
            
   
        try {
            $stmt = $this->connect()->prepare("INSERT INTO ".$this->tablaNombreLineas." (carritos_car_id, lincar_cantidad,
            lincar_precioUnitario, productos_pro_id) VALUES (?, ?, ?, ?)");
            
            $stmt->execute([$carritoid,$cantidad,$precioUnitario,$productoid]);
            return true;
            }
        catch (Exception $e){
            echo "Error al insertar datos linea de carrito".$e->getMessage();
            return $e->getMessage();
            }
    
    }
    
    Protected function getLineas($carritoid) {
        try {
            $stmt = $this->connect()->prepare("SELECT  lincar_id, carritos_car_id, lincar_cantidad,
            lincar_precioUnitario, productos_pro_id, pro_nombre, (lincar_precioUnitario*lincar_cantidad) as subtotal
                                            FROM ". $this->tablaNombreLineas. " 
                                            join productos on productos_pro_id = pro_id WHERE carritos_car_id = ?");
            $stmt->execute([$carritoid]);
            $this->tablaNumReg = $stmt->rowCount();
            return $stmt->fetchAll();
            }
        catch (Exception $e){
            return $e->getMessage();
            }
    }
    
    Protected function getCarrito($usuarioid) {
        try {
            $stmt = $this->connect()->prepare("SELECT   car_id, car_fecha
                                                FROM ". $this->tablaNombre."  WHERE usuarios_usu_id = ?");
            $stmt->execute([$usuarioid]);
            if ( $stmt->rowCount() >0) {
                return  $stmt->fetchAll()[0];
                
            }else{
                return false;
            };
        }
        catch (Exception $e){
            return $e->getMessage();
        }
     
    }
    Protected function deleteCarrito($carritoid){
            
            try {
                $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE car_id=?");
                $stmt->execute([$carritoid]); // borra las lineas en cascada
                return true;
                }
            catch (Exception $e){
                    return $e->getMessage();
                }
    }
    Protected function deleteLineaCarrito($lineaid){
            
        try {
            $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombreLineas."  WHERE lincar_id=?");
            $stmt->execute([$lineaid]); // borra la linea
            return true;
            }
        catch (Exception $e){
                return $e->getMessage();
            }
}
}