<?php
session_start();
include "../connection.php";
$contributor_id=$_GET['contibutor_id'];
$charity_id=$_SESSION['userid']; 
echo $charity_id." ".$contributor_id;
$query = "select * from charity_like where charity_id=$charity_id and contributor_id=$contributor_id ";
$execute = mysqli_query($connection, $query);  
$row = mysqli_fetch_array($execute, MYSQLI_ASSOC);  
$no_rows = mysqli_num_rows($execute);  

if($no_rows >0){  
    header("Location:viewcontributor.php");
    exit();
}  
else{  
   
   $sql="INSERT INTO charity_like VALUES ($charity_id , $contributor_id )";
    if(mysqli_query($connection,$sql))
    {
        header("Location:viewcontributor.php");
        exit();
    }
    else
    {
        echo "Error".$sql."<br>".mysqli_error($conn);
    }
}
?>