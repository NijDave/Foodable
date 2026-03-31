<?php
session_start();
include "../connection.php";
$charity_id=$_GET['charity_id'];
$contributor_id=$_SESSION['userid'];


$query = "update charity_request_contributor set request_status=1 where charity_id=$charity_id and contributor_id=$contributor_id";
if(mysqli_query($connection,$query))
{
    header("Location:contributor_home.php");
    exit();
}
else
{
    echo "Requested";
}

?>