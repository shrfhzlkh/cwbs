<?php 
session_start();
include ("config.php");
if(isset($_GET['id'])){

$id=$_GET['id'];
$cust_id=$_SESSION['Cust_id'];
echo $cust_id;

$booking="INSERT INTO booking (Service_id,Cust_id) VALUES ($id,$cust_id)";
if(mysqli_query($conn,$booking)){
    $lastid = mysqli_insert_id($conn); 
    header ("location:cardetails.php?book_id=$lastid&id=$id");
}
}

else if(isset($_POST['platenum'])){
    $id=$_POST['id'];
    $book_id=$_POST['book_id'];
    $platenum=$_POST['platenum'];
    $carsize=$_POST['carsize'];
    $car="INSERT INTO car (Car_platenum, Car_size) VALUES ('$platenum','$carsize')";
    
    if(mysqli_query($conn,$car)){
    $lastid = mysqli_insert_id($conn); 
    $booking="UPDATE booking SET car_id = $lastid WHERE Book_id=$book_id";
    if(mysqli_query($conn,$booking)){
        header ("location:date.php?book_id=$book_id&id=$id");

    }
}
}


else if(isset($_POST['date_book'])){
    $book_id=$_POST['book_id'];
    $id=$_POST['id'];
    $date=  date("Y-m-d", strtotime($_POST['date_book']));

    $booking="UPDATE booking SET Book_date='$date' WHERE Book_id=$book_id";
    
    if(mysqli_query($conn,$booking)){
        header ("location:time.php?book_id=$book_id&date_book=$date&id=$id");

    }
}

else if(isset($_POST['time_slot'])){
    $book_id=$_POST['book_id'];
    $id=$_POST['id'];
    $date=$_POST['date'];


    $time=$_POST['time_slot'];

    $booking="UPDATE booking SET Book_time='$time' WHERE Book_id=$book_id";
    
    if(mysqli_query($conn,$booking)){
        header ("location:addservice.php?book_id=$book_id&date_book=$date&id=$id");

    }
}

else if(isset($_GET['addon'])){
    $book_id=$_GET['book_id'];
    $addon=  $_GET['addon'];
    $datebook=$_GET['date'];
    $id=$_GET['servid'];

    $add="INSERT INTO add_on(Book_id, Service_id) VALUES ($book_id, $addon)";
    
    if(mysqli_query($conn,$add) ){
        $lastid = mysqli_insert_id($conn); 
        $booking="UPDATE booking SET Add_id=$lastid WHERE Book_id=$book_id";
        if(mysqli_query($conn,$booking))
        header ("location:summary.php?book_id=$book_id&last_id=$lastid&date=$datebook&id=$id");

    }
}
?>