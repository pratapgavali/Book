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
if ($_SESSION['is_login2']) {

  if (isset($_REQUEST['ok'])) {
    // code...

  $post_id=$_REQUEST['post_id'];
  $newstatus=$_REQUEST['newstatus'];
  $sql="UPDATE orders SET status='$newstatus' WHERE post_id='$post_id'";

  $sql3="UPDATE book_post SET status='$newstatus' WHERE post_id='$post_id'";
  $result3=$conn->query($sql3);
  $result=$conn->query($sql);
  if ($result) {
    echo "Status Change Succesful!";
  }
  else {
    echo "Something Wrong!";
  }
  }

}

else {
  echo "<script>location.href='Adminlog_in.php'</script>";
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Status</title>

    <style media="screen">

    body{
      background: url('books.jpg');
      background-size:cover;
      font-family: arial;
    }

    input[type=text]{
      padding: 12px 5px;
      margin: 5px;
      width:100%;
      outline: none;
      background: rgba(0,0,0,0.10);
      border:none;
      border-bottom: 3px solid #fff;
      border-radius: 5px;
      border-sizing:border-box;
      color:#fff;
      font-width:bold;
    }
    input[type=text]:focus{
      transition: 1s;
      width:100%;
      border-bottom: 3px dotted red;

    }
    input[type=submit]{
      width:50%;
      box-sizing: border-box;
      outline: none;
      background: #60adde;
      border: none;
      opacity: 0.7;
      border-radius: 20px;
      font-size:20px;
      color: #fff;
      margin-top: 20px;
      margin-left: 25px;
    }
    input[type=submit]:hover{
      background: #003366;
      opacity: 0.7;
    }

    .d1{
      max-width: 350px;
      margin: auto;
      background: rgba(0, 0, 0, 0.8);
      box-sizing: border-box;
      padding: 40px;
      color:#fff;
      margin-top: 5%;

    }

    </style>
  </head>
  <body>
    <div class="d1">  <!-- d1 class start  -->

      <form class="" action="" method="post">
      <input type="text" name="post_id" value="" placeholder="Enter Post ID" required>
      <input type="text" name="newstatus" value="" placeholder=" Enter New Status(delivered or canceled)" required>
      <input type="submit" name="ok" value="Submit" >
      </form>

    </div>  <!-- d1 class close  -->
  </body>
</html>
