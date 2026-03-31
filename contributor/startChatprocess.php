<?php
session_start();
include "../connection.php";
$charity_id=$_GET['charity_id'];
$contributor_id=$_SESSION['userid']; 
$query = "select * from users where usertype='charity' and user_type_id=$charity_id ";
//$execute = mysqli_query($connection, $query);  
$result=$connection->query($query);
while($row=$result->fetch_assoc())
{
       $uniqueid= $row["unique_id"];
       //echo $uniqueid;
}
//$path="../char.php?user_id=".$uniqueid;
header("Location:../chat.php?user_id=".$uniqueid);
exit(); 
?>