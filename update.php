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
  if($_SESSION['is_login']){
  $email=$_SESSION['Email'];

  $sql="SELECT fname,lname,mob_no,passwd FROM register WHERE email='$email'";
  $result=$conn->query($sql);
  if($result->num_rows==1){
    $row=$result->fetch_assoc();
    $fname=$row['fname'];
    $lname=$row['lname'];
    $mob_no=$row['mob_no'];
    $pass=$row['passwd'];
  }


}
else {
  echo"<script> location.href='log_in.php';</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Info</title>
    <style media="screen">

    body{
      background: url('books.jpg');
      background-size:cover;
      font-family: arial;
      margin-top: 8%;

    }

    .wrap{
      max-width: 1000px;
      margin: auto;
      background: rgba(0, 0, 0, 0.8);
      box-sizing: border-box;
      padding: 40px;
      color:#fff;
      margin-top: 5%;
      margin-right: auto;
    }

    .update1 input[type=text],input[type=password]{

      padding: 12px 5px;
      margin: 5px;
      width=100%;
      outline: none;
      background: rgba(0,0,0,0.10);
      border:none;
      border-bottom: 3px solid #fff;
      border-radius: 5px;
      border-sizing:border-box;
      color:#fff;
      font-width:bold;
      text-align: center;

    }


    .update1  input[type=submit]{
      width:20%;
      box-sizing: border-box;
      margin-top:30px;
      outline: none;
      background: #60adde;
      border: none;
      opacity: 0.7;
      border-radius: 20px;
      font-size:20px;
      color: #fff;
      margin-top: 10px;
      padding: 10px;
    }
    .update1 input[type=submit]:hover{
      background: #003366;
      opacity: 0.7;
    }

    </style>
  </head>
  <body style="color:	">
    <center>
      <form class="wrap" action="update1.php" method="post">


    <div class="update1">
    <h4 style="font-size:30px;">NAME</h4>
    <input type="text" name="fname" value="<?php echo $fname; ?> " required>
    <input type="text" name="lname" value="<?php echo $lname; ?> " required><br>
    <h4 style="font-size:30px;">MOBILE NO.</h4>
    <input type="text" name="mobi_no" value="<?php echo $mob_no; ?> " required><br>
    <h4 style="font-size:30px;">PASSWORD</h4>
    <input type="password" name="passwd" value="<?php echo $pass; ?> " required><br><br>
    <a href="update1.php"> <input type="submit" name="Update" value="Done"></a>
      </form>
    </div>
  </center>
  </body>
</html>
