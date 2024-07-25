<?php 

class VendedorContr extends Vendedor{
    private $id;
    private $username;
    private $password;
    private $repeatPwd;
    private $email;
    private $telefono;
    
    

    public function __construct($id ='',$username='', $password='', $repeatPwd='', $email='', 
                                 $telefono='' )
    {   $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->repeatPwd = $repeatPwd;
        $this->email = $email;
        $this->telefono = $telefono;
        
    }

    /**Setters and getters */
    public function setUsername($username){
         $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
   
    public function setRepeatPwd($repeatPwd){
        $this->repeatPwd = $repeatPwd;
    }
    public function getRepeatPwd(){
        return $this->repeatPwd;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
       return $this->email;
    }
    /*** Terminar */

    private function emptyInput($input){
        $result = false;
        if(empty($input)){ $result = true;}
        return $result;
    }
    private function invalidUsername(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){ $result = true;}
        return $result;
    }
    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){ $result = true;}
        return $result;
    }

    private function noPwdMatch(){
        $result = false;
        if($this->password !== $this->repeatPwd){ $result = true;}
        return $result;
    }
    private function venTakenChec(){       
        $this->id = $this->checkMailVen($this->username, $this->email);
        return $this->id;
    }
    public function signupVendedor(){
        //validationes
        if( $this->emptyInput($this->username)  || 
            $this->emptyInput($this->password)  || 
            $this->emptyInput($this->repeatPwd)  ||
            $this->emptyInput($this->email)  ||
            $this->emptyInput($this->telefono) ){
            header("Location: ../view/vendedores_signup.php?error=emptyInput");
            exit();
        }
        if($this->invalidUsername() ){
        header("Location: ../view/vendedores_signup.php?error=invalidUsername");
        exit();
        }
        if($this->invalidEmail()){
            header("Location: ../view/vendedores_signup.php?error=invalidEmail");
            exit();
        }
        if($this->noPwdMatch()){
            header("Location: ../view/vendedores_signup.php?error=noPwdMatch");
            exit();
        }
        if($this->venTakenChec()){
            header("Location: ../view/vendedores_signup.php?error=userMailTaken");
            exit();
        }
        //setUser to DB
        if(!$this->setVendedor( $this->username, $this->password, $this->email,
                            $this->telefono )){
            header("Location: ../view/vendedores_signup.php?error=FailedStmt");
            exit();
        }
     
        header("Location: ../view/vendedores_signup.php?error=done"); //Volver a la pagina inicial
    }

    public function loginVendedor(){
        //validationes
        if( $this->emptyInput($this->username)|| 
            $this->emptyInput($this->password)){
            header("Location: ../view/vendedores_login.php?error=emptyInput");
            exit();
        }
        //verifyUser in DB
        $res = $this->verifyLoginVendedor($this->username, $this->password);
        if($res==1){
            header("Location: ../view/vendedores_login.php?error=FailedStmt");
            exit();
        }
        if($res==2){
            header("Location: ../view/vendedores_login.php?error=invalidUsername");
            exit();
        }
        if($res==3){
            header("Location: ../view/vendedores_login.php?error=invalidPassUser");
            exit();
        }
    }
}