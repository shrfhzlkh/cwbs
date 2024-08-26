<?php
session_start();
include ("config.php");

//Define the query
$id=$_GET['book_id'];
$sql = "DELETE FROM booking WHERE Book_id = $id";
//sends the query to delete the entry

if(mysqli_query($conn,$sql)){
    //if it updated
header ("location:index.php");
 }
else {
 echo "error";
}

 ?>