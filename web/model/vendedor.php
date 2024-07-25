<?php
class Vendedor extends Connection{

    private $tablaNombre = "vendedores";
    private $tablaNumReg = 0;

    protected function setVendedor( $username, $password, $email,
                                $telefono=""){
        $exito = false;
        $stmt = $this->connect()->prepare("INSERT INTO $this->tablaNombre (
                                        ven_username, ven_password, ven_email,
                                        ven_telefono
                                        ) 
                                        VALUES (?,?,?,?)");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $exito= $stmt->execute(array($username, $password, $email, $telefono));
        $stmt = null;
        return $exito;

    }

    protected function checkMailVen($username, $email){
        $existe = false; // devolvera true si el username o el email existen ; false en otro caso
        $stmt = $this->connect()->prepare("SELECT ven_id FROM $this->tablaNombre WHERE ven_id = ? OR ven_email = ?;");
        if($stmt->execute(array($username, $email))){
            if($stmt->rowCount() > 0){
                $existe = true;
            }
        }
        $stmt = null;
        return $existe;
    }

    protected function verifyLoginVendedor($username, $password){
        $error = 0;
        $stmt = $this->connect()->prepare("SELECT ven_password from $this->tablaNombre WHERE ven_username = ?");
        $status = 1;
        if(!$stmt->execute(array($username))){
            $error = 1; // devuelve 1 si hay fallo en ejecución statement
        }
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
            $hashedPwd = $res[0]['ven_password'];
            if(password_verify($password, $hashedPwd)==false){
                $error = 3; // devuelve 3 si la password no coincide
            }else{
                $_SESSION["ven_username"] = $username;
            }
        }else{
            $error = 2; // devuelve 2 si no existe registro de username
        }
        $stmt = null;
        return $error;
    }
    

}
