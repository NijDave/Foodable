<?php
$db_server = "localhost";
$id = "root";
$password = "";
$db_name = "foodable";
$img="";

// Establish connection
$connection = new mysqli($db_server, $id, $password);
mysqli_select_db($connection, $db_name); 

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
?>
