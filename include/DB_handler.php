<?php
  class DB_handler{
    private $conn;

    function __construct(){
      require_once 'DB_connect.php';
      $db = new DB_connect();
      $this->conn = $db->connect();
    }

    public function checkLogin($email, $password){
      $stmt = $this->conn->prepare("SELECT * FROM uin_tbl WHERE email = ?");
      $stmt->bind_param("s", $email);
      if($stmt->execute()){
        $user_info = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        $password_r = $user_info['password'];
        if($password == $password_r){
          return $user_info;
        }
      }else {
        return NULL;
      }
    }
  }

 ?>
