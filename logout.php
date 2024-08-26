<?php
session_start();
session_unset();
session_destroy();

header('location:index.php');
$_SESSION['login']='0';
?>