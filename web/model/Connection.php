<?php

class Connection {

    private $SQL_Statement1;
    private $SQL_Statement2;
    private $SQL_Params1; // Tipo array
    private $SQL_Params2; // Tipo array
    private $SQL_Result;
    private $SQL_Error;

    public function getStatement1(){
        return $this->SQL_Statement1;
    }
    public function getStatement2(){
        return $this->SQL_Statement2;
    }
    public function getParams1(){
        return $this->SQL_Params1;
    }
    public function getParams2(){
        return $this->SQL_Params2;
    }
    public function setStatement1($SQL_Statement1){
        $this->SQL_Statement1 = $SQL_Statement1;
    }
    public function setStatement2($SQL_Statement2){
        $this->SQL_Statement2 = $SQL_Statement2;    
    }
    public function setParams1($SQL_Params1){
        $this->SQL_Params1 = $SQL_Params1;

    }
    public function setParams2($SQL_Params2){
        $this->SQL_Params2 = $SQL_Params2;

    }
    
    protected function connect(){
        try {
            $con = new PDO('mysql:host=localhost;dbname=tienda', 'root','');
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
  
    protected function transaction(){ 
        try {
            $con = $this->connect();
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $con->beginTransaction();
            $con->prepare($this->SQL_Statement1);
            $con->exec($this->SQL_Params1);
            $con->prepare($this->SQL_Statement2);
            $con->exec($this->SQL_Params2);
            $con->commit();

        } catch (PDOException $e) {
            $con->rollBack();
            return "Fallo!: ". $e->getMessage()."<br>";
        }
    }
    protected function disconnect(){
        $this->con = null;
    }
    
}