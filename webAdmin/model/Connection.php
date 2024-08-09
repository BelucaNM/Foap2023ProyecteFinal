<?php

class Connection {

    protected function connect(){
        try {
            $con = new PDO('mysql:host=localhost;dbname=tienda', 'root','');
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            return $con;
        } catch (PDOException $e) {
            return "Error!: ". $e->getMessage()."<br>";
        }
    }
}