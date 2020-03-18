<?php
   
    $server='localhost';
    $username='root';
    $pass='';
    $database='colegio';
    
    try{
        $conn =new PDO("mysql:host=$server;dbname=$database",$username,$pass);
    }
    catch (PDOExcetpcion $e){
        die('conexion fallida: '.$e->getMessage());
    }
?>
