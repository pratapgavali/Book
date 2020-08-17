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
  if (!isset($_SESSION['is_login2'])) {



      if (isset($_REQUEST['Log'])) {
        // code...
        $email=$_REQUEST['Email'];
        $pass=$_REQUEST['password'];
        $sql="SELECT email,pass FROM admin WHERE email='".$email."' AND pass='".$pass."'";
        $result=$conn->query($sql);
        if ($result->num_rows==1) {

          $_SESSION['is_login2']= true;
          $_SESSION['Email2']= $email;
          echo "<script> location.href='AdminProfile.php'; </script>";

        }
        else {
          $msg = "
              <head><style>.c1{ background-color:rgba(255, 0, 0, 0.5); padding:2px;border-radius:7px; text-align:center; margin-top:5px; }</style></head>
          <div class='c1' >Sorry Something error!<div>";
        }
      }

    }
    else {

        echo "<script> location.href='AdminProfile.php'; </script>";
    }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="">

      <style media="screen">

      body{
        background: url('books.jpg');
        background-size:cover;
        font-family: arial;
      }
      .wrap{
        max-width: 350px;
        margin: auto;
        background: rgba(0, 0, 0, 0.8);
        box-sizing: border-box;
        padding: 40px;
        color:#fff;
        margin-top: 5%;
        margin-right: auto;
      }
      .wrap input[type=text],input[type=password]{
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
      }
      .wrap h4{
        margin-left: 50px;
        margin-top: 25px;
        margin-bottom: -1px;
      }
      .wrap input[type=text]:focus,input[type=password]:focus{
        transition: 1s;
        width:100%;
        border-bottom: 3px dotted red;

      }
       .wrap input[type=submit]{
         width:50%;
         box-sizing: border-box;
         margin-top:30px;
         outline: none;
         background: #60adde;
         border: none;
         opacity: 0.7;
         border-radius: 20px;
         font-size:20px;
         color: #fff;
         margin-top: 20px;
       }
       .wrap input[type=submit]:hover{
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

      </style>

  </head>
    <body>

    <div class="wrap2"> <!-- wrap2 class start  -->
    <tr>
      <a href="home.php"> <p style="color:skyblue"><b> HOME </b></p></a>
    </tr>
  </div>  <!-- wrap2 class close  -->



    <div class="wrap">  <!-- wrap class start  -->

      <h2>Log In</h2>
      <form class="" action="" method="post">
        <input type="text" name="Email" placeholder="Email" required>
        <input type="password" name="password" placeholder="password" required><br>
        <input type="submit" value="Log In" name="Log">
      </form>

        <?php
          if (isset($msg)) {
            // code...
            echo $msg;
          }

         ?>

       </div>  <!-- wrap class close  -->

    </body>
</html>
