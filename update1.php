<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="obs";
$dbport="3306";

  $conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname,$dbport);
  if ($conn->connect_error) {
    // code...
    die("connection failed!");
  }
session_start();
if ($_SESSION['is_login']) {
  // code...
  $email=$_SESSION['Email'];

$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$mob_no=$_REQUEST['mobi_no'];
$pass=$_REQUEST['passwd'];
$sql="UPDATE register SET fname='$fname',lname='$lname',mob_no='$mob_no',passwd='$pass' WHERE email='$email' ";
$result=$conn->query($sql);
if ($result) {
  // code...

    echo "<script>location.href='log_in.php';</script>";

}
}

else {
  echo "<script>location.href='log_in.php';</script>";
}

 ?>
