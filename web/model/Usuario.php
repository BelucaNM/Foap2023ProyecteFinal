<?php
class Usuario extends Connection{

    private $tablaNombre = "usuarios";
    private $tablaNumReg = 0;

    protected function setUser( $username, $password, $email,
                                $apellido="", $nombre="", $dni="",
                                $direccion="", $municipio="" ){
        $error = 0;
        $stmt = $this->connect()->prepare("INSERT INTO $this->tablaNombre (
                                        usu_username, usu_passwrod, usu_email,
                                        usu_apellido, usu_nombre, usu_dni,
                                        usu_direccion, usu_municipio
                                        ) 
                                        VALUES (?,?,?,?,?,?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array(   $username, $hashedPwd, $email,
                                    $apellido, $nombre, $dni,
                                    $direccion, $municipio))){
            $error = 1; // devuelve 1 si ha habido error
            }
        $stmt = null;
        return $error;

    }

    protected function checkUser($username, $email){
        $error = 1; // devuelve 1 si el username o el email existen ; 0 en otro caso
        $stmt = $this->connect()->prepare("SELECT usu_id FROM $this->tablaNombre WHERE usu_id = ? OR usu_email = ?;");
        if(!$stmt->execute(array($username, $email))){
            $error = 0;
        }else{
            if($stmt->rowCount() = 0){
                $error = 0;
            }
        }
        $stmt = null;
        return $error;
    }

    protected function verifyLoginUser($username, $password){
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT usu_password from $this->tablaNombre WHERE usu_username = ?");
        $status = 1;
        if(!$stmt->execute(array($username))){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        }
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
            $hashedPwd = $res[0]['usu_password'];
            if(password_verify($password, $hashedPwd)==false){
                $error = 3; // devuelve 3 si la password no coincide
            }else{
                $_SESSION["username"] = $username;
            }
        }else{
            $error = 2; // devuelve 2 si no existe registro de username
        }
        $stmt = null;
        return $error;
    }

    protected function checkToken($token){
        
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT TIMESTAMPDIFF(minute,deadLine,now()) as diff FROM $this->tablaNombre WHERE usu_token = ?");
    
        if (!$stmt->execute(array($token))){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        }else{
            if( $stmt->rowCount() >0) {
                $tiempo = $stmt->fetch();
                if($tiempo[0]['diff'] > 30){  // devuelve 3 ai hay  diferencia mayor de 30 minutos que es tiempo de validez del token
                    $error = 3; 
                }
            }else{
                $error = 2; // devuelve 2 si no existe registro de token
            }
        };
                
        $stmt = null;
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
                $array [1] =$result['usu_username']; 
            }else{
                 $error = 2; // devuelve 2 si no existe registro de email
            }
        };
        $stmt = null;
        $array [0] =$error;
        return $array; // devuelve un array con el codigo de error y el username si existe
        }

    protected function updateConToken($email,$token) {
            
        $result = 1;
        $stmt = $this->connect()->prepare("UPDATE $this->tablaNombre SET token = ?, deadLine=now() WHERE usu_email = ?");
                       
        if(!$stmt->execute(array($token,$email))){
            $result = 0; // no se ha podido hacer la actualización
            }
                        
        $stmt = null;
        return $result;
        }
}
