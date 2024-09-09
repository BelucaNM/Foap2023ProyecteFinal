<?php

class Config {
    const WINDOWS = 'WINNT';
    const LINUX = 'Linux';
    

    private $OSlocal;
    private $db_name; // para model/Connection.php
    private $db_user;// para model/Connection.php
    private $db_password; //  para model/Connection.php
    private $linkEmail; // para controler/usuarioContr.php/function enviaEmail
    
    public function getOSlocal(){
        return $this->OSlocal;
    }
    public function getdbname(){
        return $this->db_name;
    }
    public function getdbuser(){
        return $this->db_user;
    }
    public function getdbpassword(){
        return $this->db_password;
    }
    public function getlinkEmail(){
        return $this->linkEmail;
    }
    public function setOSlocal($OSlocal){
        $this->OSlocal = $OSlocal;
    }
    public function setdb_name($db_name){
        $this->db_name = $db_name;
    }
    public function setdb_user($db_user){
        $this->db_user = $db_user;
    }
    public function setdb_password($db_password){
        $this->db_password = $db_password;    
    }
    public function setlinkEmail($linkEmail){
        $this->linkEmail = $linkEmail;

    }

    
    public function __construct($OS)
    {    
        $this->OSlocal = $OS;
   
        if ($OS == 'WINNT') {
            $this->db_name = 'tienda';
            $this->db_user = 'root';
            $this->db_password = '';
            $this->linkEmail = 'http://localhost/FOAP2023PROYECTEFINAL';
        }
        if ($OS == 'Linux') {
            $this->db_name = 'objetivos';
            $this->db_user = 'root';
            $this->db_password = 'Mazinger72';
            $this->linkEmail = 'http://147.83.7.203/objetivos';
        }

    }
    public function __destruct()
    {
            
            $this->OSlocal;
            $this->db_name = null;
            $this->db_user = null;
            $this->db_password = null;
            $this->linkEmail = null;
            
    }

    <?php

    // Definir la primera clase con constantes
    class SistemaOperativo {
        
    }
    
    // Definir otra clase que acceda a las constantes de SistemaOperativo
    class EjecutarComando {
        public function ejecutarPorSistema($sistema) {
            switch ($sistema) {
                case SistemaOperativo::WINDOWS:
                    echo "Ejecutando en Windows" . PHP_EOL;
                    break;
                case SistemaOperativo::LINUX:
                    echo "Ejecutando en Linux" . PHP_EOL;
                    break;
                case SistemaOperativo::MAC:
                    echo "Ejecutando en macOS" . PHP_EOL;
                    break;
                default:
                    echo "Sistema operativo no soportado" . PHP_EOL;
            }
        }
    }
    
    // Ejemplo de uso
    $comando = new EjecutarComando();
    $comando->ejecutarPorSistema(SistemaOperativo::WINDOWS); // Ejecutando en Windows
    $comando->ejecutarPorSistema(SistemaOperativo::LINUX);   // Ejecutando en Linux
    
    ?>
    NombreClase::NOMBRE_CONSTANTE;
    
    
}