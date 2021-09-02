<?php

class DBConnect{
    private $hostname = 'localhost';
    private $database = 'shopkeeper';
    private $username = 'root';
    private $passwore = '';

    public function connect(){
        try{
            $connection = new PDO("mysql:host=$this->hostname;dbname=$this->database;charset=utf8", $this->username, $this->passwore);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Database connected...";
            return $connection;
        }
        catch(PDOException $e){
            echo "Error! ".$e->getMessage();
            die();
        }
    }
}