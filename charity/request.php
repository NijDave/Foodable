<?php
session_start();
include "../connection.php";
$contributor_id=$_GET['contributor_id'];
$charity_id=$_SESSION['userid'];
$query = "select * from charity_request_contributor where charity_id=$charity_id and contributor_id =$contributor_id";
$execute = mysqli_query($connection, $query);  
$row = mysqli_fetch_array($execute, MYSQLI_ASSOC);  
$no_rows = mysqli_num_rows($execute);  

if($no_rows == 1){  
    header("Location:charity_home.php");
    exit();
}  
else{  
    $query = "INSERT INTO charity_request_contributor  VALUES ($charity_id,$contributor_id,0)";
    if(mysqli_query($connection,$query))
    {
        header("Location:charity_home.php");
        exit();
    }
}
?>