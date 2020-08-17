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
    $sql="SELECT fname,lname from register WHERE email='$email'";
    $result=$conn->query($sql);
    if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $fname = $row['fname'];
      $lname = $row['lname'];

    }
  }
  else {
    echo "<script>location.href='log_in.php'</script>";
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <style media="screen">

        body{
          background: url('books.jpg');
          background-size:cover;
          font-family: arial;
        }

        .wrap1{
          max-width: 1000px;
          margin: auto;
          background: rgba(0, 0, 0, 0.8);
          box-sizing: border-box;
          padding: 40px;
          color:#fff;

          margin-right: auto;
        }


      h1{

        background-color:#601b75;
        padding: 10px;

      }

      .c1 input[type=text]{
        width: 30%;
        padding: 10px;
      }
      .c1 input[type=text],input[type=password]{
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
      .c2{

      }

      .logout input[type=submit]{
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
        align-content: left;
        margin: 10px;
      }
      .logout input[type=submit]:hover{
        background: #003366;
        opacity: 0.7;
      }

      .wrap2{
        font-size: 20px;
        background-color: rgba(255, 0, 0, 0.5);
        padding: 4px;
        margin-top: -15px;
        width: 100%;
        margin-left: -5px;
      }
      .wrap2 p{
        margin-left: 20px;
      }
      .wrap2 p:hover{
        background: #003366;
        opacity: 0.7;
        width: 70px;
        font-size: 23px;
        transition: 0.25s;

      }
    </style>
  </head>
  <body>
    <div class="wrap2">


    <tr>
      <a href="home.php"> <p style="color:skyblue"><b> HOME </b></p></a>
    </tr>
    </div>
    <div class="wrap1">


    <h1 align="center" style="color:red" >PROFILE</h1><br>
    <center>
      <div class="c1">

    <h3 align="center" style="color:blue">NAME</h3>
    <div class="c2">


    <input type="text" align="center" name="name" value="<?php
    echo $fname,' ', $lname ?> " readonly><br><br>
    </div>
    <h3 align="center" style="color:blue">EMAIL</h3>
    <div class="c3">


    <input type="text" name="email" value="<?php
    echo $_SESSION['Email'];
     ?> " readonly>
         </div>
       </div>
     <div class="logout">
       <br><br><a href="mypost.php">  <input type="submit" value="Posts" name="posts"></a>
      <a href="sell.php">  <input type="submit" value="Sell" name="Sell"></a>
      <a href="update.php">  <input type="submit" value="Update Profile" name="update"></a>
      <a href="myorder.php">  <input type="submit" value="Orders" name="Orders"></a>
      <br><br><a href="logout.php"><input type="submit" value="Log Out" name="logout"></a>


     </div>


  </center>

  </div>
  </body>
</html>
