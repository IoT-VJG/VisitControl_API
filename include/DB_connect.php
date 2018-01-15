<?php


  class DB_connect{
    private $conn;

    function __construct(){
    }

    function connect(){
        require_once 'config.inc.php';
        $this->conn = new mysqli(DB_host, DB_user, DB_paswd, DB_dataBase);
        if(mysqli_connect_errno()){
          echo "Falló la conexión a MySql: " . mysqli_connect_error();
        }
        // echo "conexión exitosa";
        return $this->conn;
    }
  }
 ?>
