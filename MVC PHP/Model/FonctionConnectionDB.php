<?php
 class Database {
  function Connection(){
    $servername="localhost";
    $username="root";
    $password="";
    $db="base";
    $conn= new mysqli($servername,$username,$password,$db);
    return $conn;
  }
}

?>