<?php 

class UsuarioContr extends Usuario{

    private $id;
    private $username;
    private $password;
    private $repeatPwd;
    private $email;
    private $apellido;
    private $nombre;
    private $dni;
    private $direccion;
    private $municipio; // mun_id

    private $token;
    private $deadLine;
    private $cuentaActiva;
    

    public function __construct($username='', $password='', $repeatPwd='', $email='', 
                                $token='', $deadLine='', $cuentaActiva='',
                                $apellido='', $nombre='', $dni='', $direccion='', $municipio='',$id='' )
    {   $this->username = $username;
        $this->password = $password;
        $this->repeatPwd = $repeatPwd;
        $this->email = $email;
        $this->token = $token;
        $this->deadLine = $deadLine;
        $this->cuentaActiva = $cuentaActiva;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->municipio = $municipio;
        $this->id = $id;
    }

    /**Setters and getters */
    public function setId($id){
        $this->id = $id;
   }
   public function getId(){
    return $this->id;
}
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

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getApellido(){
       return $this->apellido;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
       return $this->nombre;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getDni(){
       return $this->dni;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion(){
       return $this->direccion;
    }
    public function setMunicipio($municipio){
        $this->municipio = $municipio;
    }

    public function getMunicipio(){
       return $this->municipio;
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
        $result = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        return $result;
    }

    private function noPwdMatch(){
        $result = false;
        if($this->password !== $this->repeatPwd){ $result = true;}
        return $result;
    }
    private function usernameTakenChec(){
        $result = false;
        if($this->checkUser($this->username, $this->email)){
            $result = true;
        }
        return $result;
    }
    public function signupUser(){
        //validationes
    
        if( $this->emptyInput($this->username)  || 
            $this->emptyInput($this->password)  || 
            $this->emptyInput($this->repeatPwd)  ||
            $this->emptyInput($this->municipio)  || 
            $this->emptyInput($this->email) ){
 //           header("Location: ../view/usuarios_signup.php?error=emptyInput");
        echo "user vacio ". $this->username ; echo "<br>";
        echo "email vacio ". $this->email;echo "<br>";
        echo "pass vacio ". $this->password;echo "<br>";
        echo "reppass vacio ".$this->repeatPwd;echo "<br>";
        echo "municipio vacio ". $this->municipio;echo "<br>";
            exit();
        }
        if($this->invalidUsername() ){
        header("Location: ../view/usuarios_signup.php?error=invalidUsername");
        exit();
        }
        if($this->invalidEmail()){
            header("Location: ../view/usuarios_signup.php?error=invalidEmail");
            exit();
        }
        if($this->noPwdMatch()){
            header("Location: ../view/usuarios_signup.php?error=noPwdMatch");
            exit();
        }
        if($this->usernameTakenChec()){
            header("Location: ../view/usuarios_signup.php?error=userMailTaken");
            exit();
        }
        //setUser to DB
        if(!$this->setUser( $this->username, $this->password, $this->email,
                            $this->apellido, $this->nombre, $this->dni,
                            $this->direccion, $this->municipio )){
            header("Location: ../view/usuarios_signup.php?error=FailedStmt");
            exit();
        }
     
        header("Location: ../view/usuarios_login.php?error=RegisterDone"); //Volver a la pagina inicial
    }

    public function loginUser(){
        //validationes
        if( $this->emptyInput($this->username)|| 
            $this->emptyInput($this->password)){
            header("Location: ../view/usuarios_login.php?error=emptyInput");
            exit();
        }
        //verifyUser in DB
        $res = $this->verifyLoginUser($this->username, $this->password);
        if($res['error']==1){
            header("Location: ../view/usuarios_login.php?error=FailedStmt");
            exit();
        }
        if($res['error']==2){
            header("Location: ../view/usuarios_login.php?error=invalidUsername");
            exit();
        }
        if($res['error']==3){
            header("Location: ../view/usuarios_login.php?error=invalidPassUser");
            exit();
        }
        if($res['error']==4){
            header("Location: ../view/usuarios_login.php?error=inactiveAccount");
            exit();
        }
        
        return $res['usu_id'];

    }


    public function valUpdatePassword(){
        // validaciones

       if ((    empty($this->password) || 
                empty($this->repeatPwd) || 
                empty($this->token))){
            echo " la entrada está vacia";
            header ("Location: ../view/newpassword.php?error=EmptyInput&token=".$this->token); 
            exit();
            }
            
        if ($this->password != $this->repeatPwd){
            echo " las contraseñas no coinciden";
            header ("Location: ../view/newpassword.php?error=PasswordsDontMatch&token=".$this->token); 
            exit();
            }
        
        // COMPROBAR QUE EL TOKEN EXISTE Y NO ESTA CADUCADO
        // checkToken
        // devuelve 1 si error en statement
        // devuelve 2 si token no existe
        // devuelve 3 si token esta caducado

        $result = $this->checkToken($this->token);
        if ($result == 1) {
            echo " el stmt es incorrecto";
            header ("Location: ../view/newpassword.php?error=FailedStmt");
        exit();
        }
        if ($result == 2) { 
            echo " el token  no existe";
            header ("Location: ../view/newpassword.php?error=tokenNotExist"); 
            exit();
        }
        if ($result == 3) {
            echo " el token está caducado";
            header ("Location: ../view/newpassword.php?error=tokenExpired"); 
            exit();
        }

        $result = $this->updatePassword($this->token,$this->password); // en usuario.php
//        echo $this->token;
//        echo $this->password;
        if (!$result) {
                echo " no se ha podido hacer la actualización";
                header ("location: ../bienvenida.php?error=FailedStmt");
                exit();
        } else {
                echo " actualización realizada con éxito";
                header ("location: ../view/usuarios_login.php?error=NewPassSaved");
                exit();
            }


    }
    public function activateAccount(){

        $result = $this->checkToken($this->token);

        if ($result == 1) {
                echo " el stmt es incorrecto";
                header ("location: ../includes/activacion_inc.php?error=FailedStmt");
                exit();
            }
        if ($result == 2) { 
                echo " el token  no existe";
                header ("location: ../includes/activacion_inc.php?error=tokenNotExist"); 
                exit();
            }
        if ($result == 3) {
                echo " el token está caducado";
                header ("location: ../includes/activacion_inc.php?error=tokenExpired"); 
                exit();
            }
    
        if(!$this->activaCuenta($this->token)){
                header("Location: ../includes/activacion_inc.php?error=failedStmt&token=$this->token");
                exit();
            }
        header("Location: ../views/usuarios_login.php?error=activAccount");

        }
        public function leerUser(){
            //validationes
            $res = $this->leer($this->id);
            //print_r($res);

            if(!$res){
                header("Location: ../view/usuarios_misdatos.php?error=userNotSignedUp");
                exit();
            }
//            $this->username = $res['usu_username'];
//            $this->password = $res['usu_password'];
          
//            $this->email = $res['email'];
//            $this->token = $res['token'];
//            $this->deadLine = $res['deadLine'];
//            $this->cuentaActiva = $res['cuentaActiva'];
          
            $this->apellido = $res['usu_apellido'];
            $this->nombre = $res['usu_nombre'];
            $this->dni = $res['usu_dni'];
            $this->direccion =  $res['usu_direccion'];
            $this->municipio = $res['municipios_mun_id'];
            $this->email = $res['usu_email'];
            
    
        } 
        
public function updateUser(){
    //validationes

    if (!$this->invalidEmail()){
                header ("location: ../view/usuarios_misDatos.php?error=InvalidEmail"); 
                exit();}
           
    //setUser to DB
    
    $result = $this->actualizar( $this->apellido, $this->nombre, $this->dni,
                            $this->email, $this->direccion, $this->municipio, $this->id );
    if ($result){
        header("Location: ../view/bienvenida.php?info=UpdateDone"); //Volver a la pagina inicial
        exit();
    } else {
        header("Location: ../view/usuarios_misDatos.php?error=FailedStmt");
        exit();
    } 
}
    
Public function forgotPassword(){
                // validaciones
        
    if (!$this->invalidEmail()){
                header ("location: ../view/forgotpassword.php?error=InvalidEmail"); 
                exit();}
        
    //chequea email existe en BD
    echo "forgotPassword";
        
    $result = $this->checkUserByEmail($this->email);
    print_r($result);
    if ($result[0] == 1) { 
        header("Location: ../view/forgotpassword.php?error=FailedStmt");
        exit();}
    if ($result[0] == 2) { 
        header("Location: ../view/forgotpassword.php?error=EmailDoesNotExist");
        exit();}
                    
    // $result[1]  es el username           
                 
    //  $this->setToken(bin2hex(random_bytes(16))); //  crear un token
    $this->generateToken();
                   
    //actualiza registro to DB
    if (!$this->updateConToken($this->email,$this->token)) {
        header("Location: ../view/forgotpassword.php?error=FailedUpdateToken");     
        exit();} 
                        
    // si todo esta bien, envia email
    $err= $this->enviaEmail('forgotPassword'); 
        
    //check for errors  
    if (!$err) {header("Location: ../view/usuarios_login.php?error=emailForgotPassword");
                exit();
    } else {    header("Location: ../view/usuarios_login.php?error=FailedSendEmail");
                exit();}                            
    }
        
Private function generateToken(){
        $this->token = bin2hex(random_bytes(16));
        }   
 

Public function enviaEmail($issue, $pedido=""){
//            use PHPMailer\PHPMailer\PHPMailer;
//            use PHPMailer\PHPMailer\Exception;
//            use PHPMailer\PHPMailer\SMTP;

            require '../../lib/PHPMailer/src/Exception.php';
            require '../../lib/PHPMailer/src/PHPMailer.php';
            require '../../lib/PHPMailer/src/SMTP.php';
            
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;
//            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'foap408@gmail.com';
            $mail->Password = 'dyrv alyq ojiq acyd';
        //  $mail->addAddress('$this->email', '$this->username'); // comprador
        //  $mail->addCC('beluca.navarrina@gmail.com', 'Beluca'); // vendedor
            $mail->addAddress('beluca.navarrina@gmail.com', 'Beluca');
            $mail->Subject = "Recuperar Contraseña Foap2023-OOP/blog";

        //Replace the plain text body with one created manually
        //Para enviar texto plano     
            
            if ($issue == 'forgotPassword'){
                $mail->Subject = "Recuperar Contraseña Foap2023-OOP/blog";
                $link= 'http://localhost/FOAP2023PROYECTEFINAL/web/view/newpassword.php?token='.$this->token; // aqui hay que enviar el token
                $mail->Body = "Hola,\n\nPara recuperar tu contraseña, haz click en el enlace siguiente. Si no has solicitado este
                    correo, puedes ignorarlo.\n\nSaludos,\n\nFoap2023-OOP";
                $mail->msgHTML("<a href='".$link."'> Link para crear nueva contraseña</a>"); 
                };
            if ($issue == 'activacion'){
                $mail->Subject = "Recuperar Contraseña Foap2023-OOP/blog";
                $link= 'http://localhost/FOAP2023PROYECTEFINAL/web/includes/activacion-inc.php?token='.$this->token; // aqui hay que enviar el token
                $mail->Body = "Hola,\n\nPara activar tu cuenta, haz click en el enlace siguiente. Si no has solicitado este
                    correo, puedes ignorarlo.\n\nSaludos,\n\nFoap2023-OOP";
                $mail->msgHTML("<a href='".$link."'> Link para activar su cuenta </a>"); 
                };
            if ($issue == 'factura'){
                $mail->Subject = "Su albaran Foap2023-OOP";
                $mail->Body = "Hola ".$this->username.", Adjunto albaran correspondienta a su pedido ".$pedido.".\n\Atentamente,\n\nFoap2023-OOP";
                $mail->addAttachment('../invoicesPDF/'.$pedido.'.pdf');
                };
           

            $err = 0;
            if (!$mail->send()) {
                echo 'Mailing Error: ' . $mail->ErrorInfo;
                $err = 1;
            } else {
                echo 'Message sent!';
            }
            return $err;
        } 

}