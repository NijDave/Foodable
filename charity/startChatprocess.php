<?php
session_start();
include "../connection.php";
$contributor_id=$_GET['contributor_id'];
$charity_id=$_SESSION['userid']; 
$query = "select * from users where usertype='contributor' and user_type_id=$contributor_id ";
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