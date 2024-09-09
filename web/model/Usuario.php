<?php
class Usuario extends Connection{

    private $tablaNombre = "usuarios";
    private $tablaNumReg = 0;

    
    
    protected function leer($id){

     // devolvera todo si el id existe ; false en otro caso
        $stmt = $this->connect()->prepare("SELECT * FROM $this->tablaNombre WHERE usu_id = ? ;");
        if($stmt->execute(array($id))){
            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
        }
        $stmt = null;
        return false;
    }

    protected function setUser( $username, $password, $email,
                                $apellido="", $nombre="", $dni="",
                                $direccion="", $municipio="", $token=null){
        $exito = false;
        $stmt = $this->connect()->prepare("INSERT INTO $this->tablaNombre (
                                        usu_username, usu_password, usu_email,
                                        usu_apellido, usu_nombre, usu_dni,
                                        usu_direccion, municipios_mun_id, usu_token, usu_deadLine) 
                                        VALUES (?,?,?,?,?,?,?,?,?,now())");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $exito= $stmt->execute(array( $username, $hashedPwd, $email,
                                    $apellido, $nombre, $dni,
                                    $direccion, $municipio, $token));
        $stmt = null;
        return $exito;

    }

    protected function checkUser($username, $email){
        $existe = false; // devolvera true si el username o el email existen ; false en otro caso
        $stmt = $this->connect()->prepare("SELECT usu_id FROM $this->tablaNombre WHERE usu_id = ? OR usu_email = ?;");
        if($stmt->execute(array($username, $email))){
            if($stmt->rowCount() > 0){
                $existe = true;
            }
        }
        $stmt = null;
        return $existe;
    }

    protected function verifyLoginUser($username, $password){
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT usu_id, usu_password, usu_cuentaActiva from $this->tablaNombre WHERE usu_username = ?");
        
        if(!$stmt->execute([$username])){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        } else {
            if($stmt->rowCount()>0){
                $res = $stmt->fetchAll();
                $hashedPwd = $res[0]['usu_password'];
                $activa =    $res[0]['usu_cuentaActiva'];
                $userId = $res[0]['usu_id'];
                
                if(password_verify($password, $hashedPwd)==false){
                    $error = 3; // devuelve 3 si el password no coincide
                }else{
                    if($activa==false){
                        $error = 4; // devuelve 4 si la cuenta no esta activa
                    }
                };
            }else{
                $userId = null;
                $error = 2; // devuelve 2 si no existe registro de username
            };
        };
        $stmt = null;
        $result = ['error'=>$error,'usu_id'=>$userId];
        return $result;
    }
    protected function activaCuenta($token) {        
        $result = true;
        $stmt = $this->connect()->prepare("UPDATE $this->tablaNombre SET usu_cuentaActiva = 1, usu_token=null, usu_deadLine=now() WHERE usu_token = ?");
        if(!$stmt->execute(array($token))){
            $result = false;
            }
             
        $stmt = null;
        return $result;
        }

    protected function checkToken($token){
        
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT TIMESTAMPDIFF(minute,usu_deadLine,now()) as diff FROM $this->tablaNombre WHERE usu_token = ?");
    
        if (!$stmt->execute([$token])){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        }else{
            if( $stmt->rowCount() >0) {
                $tiempo = $stmt->fetchAll();
                var_dump($tiempo);
                if($tiempo[0]['diff'] > 30){  // devuelve 3 si hay  diferencia mayor de 30 minutos que es tiempo de validez del token
                    $error = 3; 
                }
            }else{
                $error = 2; // devuelve 2 si no existe registro de token
            }
        };
                
        $stmt = null;
        $result = ['error'=>$error,'token'=>$token];
        var_dump ($result);
        return $error;
        }

    protected function checkUserByEmail($email){

        $error = 0;
        $stmt = $this->connect()->prepare("SELECT usu_username FROM $this->tablaNombre WHERE usu_email = ?;");

        if (!$stmt->execute(array($email))){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        }else{
            if( $stmt->rowCount() >0) {
                $result = $stmt->fetch();
                print_r($result);
                $array[1] =$result['usu_username']; 
            }else{
                 $error = 2; // devuelve 2 si no existe registro de email
            }
        };
        $stmt = null;
        $array[0] =$error;
        return $array; // devuelve un array con el codigo de error y el username si existe
        }

    protected function updateConToken($email,$token) {
            
        $result = 1;
        $stmt = $this->connect()->prepare("UPDATE $this->tablaNombre SET usu_token = ?, usu_deadLine=now() WHERE usu_email = ?");
                       
        if(!$stmt->execute(array($token,$email))){
            $result = 0; // no se ha podido hacer la actualización
            }
                        
        $stmt = null;
        return $result;
        }
    
    protected function updatePassword($token, $password) {        
        $result = true;
        $stmt = $this->connect()->prepare("UPDATE $this->tablaNombre SET usu_password = ?, usu_token=null, usu_deadLine=now() WHERE usu_token = ?");
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        
        if(!$stmt->execute(array($hashedPwd, $token))){
                $result = false;
            }
                   
        $stmt = null;
        return $result;
        }
    protected function actualizar ($apellido,$nombre,$dni,$email,$direccion,$municipio,$id){
            
            try {

                $stmt = $this->connect()->prepare("UPDATE $this->tablaNombre SET 
                                        usu_email =?,usu_apellido=?, usu_nombre=?, usu_dni=?,
                                        usu_direccion =?, municipios_mun_id =? WHERE usu_id=?");
                
                $result = $stmt->execute([$email, $apellido,$nombre,$dni, 
                               $direccion,$municipio,$id]);
                return $result;
                }
            catch (Exception $e){
                    return $e->getMessage();
                }
        }
        
    protected function eliminar($id){
                
                try {
                    $stmt = $this->connect()->prepare("DELETE FROM ".$this->tablaNombre."  WHERE usu_id=?");
                        $stmt->execute([$id]);
                     }
                catch (Exception $e){
                        return $e->getMessage();
                    }
        }
    

}
