<?php
session_start();
include ("config.php");

if(isset($_GET['cardetails']))
{
    $bookid=$_GET['cardetails'];
    $sql = "DELETE FROM booking WHERE Book_id = $bookid";

    if(mysqli_query($conn,$sql)){
    header ("location:booking.php");
    }
    else {
    echo "error";
    }

} 

if(isset($_GET['date']))
{
    $bookid=$_GET['date'];
    $id=$_GET['id'];
    $sql = "UPDATE booking SET car_id=null WHERE Book_id=$bookid";

    if(mysqli_query($conn,$sql)){
    header ("location:cardetails.php?book_id=$bookid&id=$id");
    }
    else {
    echo "error";
    }

} 

if(isset($_GET['time']))
{
    $bookid=$_GET['time'];
    $id=$_GET['id'];
    $sql = "UPDATE booking SET Book_date=null WHERE Book_id=$bookid";

    if(mysqli_query($conn,$sql)){
    header ("location:date.php?book_id=$bookid&id=$id");
    }
    else {
    echo "error";
    }

} 

if(isset($_GET['addservice']))
{
    $bookid=$_GET['addservice'];
    $id=$_GET['id'];
    $date=$_GET['date_book'];

    $sql = "UPDATE booking SET Book_time=null WHERE Book_id=$bookid";

    if(mysqli_query($conn,$sql)){
    header ("location:time.php?book_id=$bookid&date_book=$date&id=$id");
    }
    else {
    echo "error";
    }

} 

if(isset($_GET['summary']))
{
    $bookid=$_GET['summary'];
    $id=$_GET['id'];
    $date=$_GET['date_book'];

    $sql = "UPDATE booking SET Add_id=null WHERE Book_id=$bookid";

    if(mysqli_query($conn,$sql)){
    header ("location:addservice.php?book_id=$bookid&date_book=$date&id=$id");
    }
    else {
    echo "error";
    }

} 


?>
