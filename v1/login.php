<?php
  require_once '../include/DB_handler.php';
  $db = new DB_handler();
  //
  $response = array("error" => FALSE);
  //
  //
  if (isset($_POST["email"]) && isset($_POST["password"])) {
      $username = $_POST["email"];
      $password = $_POST["password"];
      $result = $db->checkLogin($username, $password);
      if($result != false){
        $response["error"] = FALSE;
        $response["opStatus"]      = "Credenciales correctas";
        $response["User"]["id"]    = $result['id'];
        $response["User"]["name"]  = $result['username'];
        $response["User"]["email"] = $result['email'];
        $response["User"]["Passw"] = "Match!";
        echo json_encode($response);
      }else{
        $response["error"] = TRUE;
        $response["opStatus"] = "Credenciales incorrectas jeje !";
        echo json_encode($response);
      }
  }else {
      $response["error"] = TRUE;
      $response["opStatus"] = "Se necesitan ambos valores!";
      echo json_encode($response);
  }

?>
