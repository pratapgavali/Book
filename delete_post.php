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



            if (isset($_REQUEST['delete'])) {
              $id=$_REQUEST['post_id'];
              $sql="DELETE FROM  book_post WHERE post_id='$id'";
              $result=$conn->query($sql);
              if ($result) {
                echo "<script>location.href='mypost.php'</script>";
              }
            }
 ?>
