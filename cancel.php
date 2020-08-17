<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="obs";
$dbport="3306";

  $conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname,$dbport);
  if ($conn->connect_error) {

    die("connection failed!");
  }
  session_start();
  $email=$_SESSION['Email'];
  $sql="UPDATE orders SET status='canceled' WHERE order_id={$_REQUEST['id']}";
  $result=$conn->query($sql);
  if ($result) {
    echo "<script> location.href='Profile.php' </script>";
  }

 ?>
