<?php


    //ceate connection...
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

      else {



          if (isset($_REQUEST['rsign'])) {
            // code...
            $email2=$_REQUEST['Email'];
            $sql1="SELECT *FROM register WHERE email='$email2'";
            $result2=$conn->query($sql1);
              if ($result2->num_rows>0) {

                $msg="<head><style>.c1{ background-color:rgba(255, 0, 0, 0.5); padding:2px;border-radius:7px; text-align:center; margin-top:12px; }</style></head>
                <div class='c1' >The Email Is Already Registed!<div> ";
                // code...
              }

              else {


        //storing data in variables...
        $fname=$_REQUEST['FirstName'];
        $lname=$_REQUEST['LastName'];
        $email=$_REQUEST['Email'];
        $mobno=$_REQUEST['mobilenumber'];
        $pass=$_REQUEST['password'];

        if(strlen($mobno)==10){

          $sql="INSERT INTO register (fname,lname,email,mob_no,passwd) VALUES ('$fname','$lname','$email','$mobno','$pass')";
          $result=$conn->query($sql);
          if ($result) {
            // code...
            echo "<script>location.href='log_in.php';</script>";
          }
        }

        else {
          $msg2="Please enter valid mobile number!";
        }

          }
          }
        }



 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    .wrap h3{
      margin-left: 50px;
      margin-top: 30px;
    }
    .wrap input[type=text]:focus,input[type=password]:focus{
      width:100%;
      border-bottom: 3px dotted red;
      transition: 1s;
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
       margin-top: 10px;
     }
     .wrap input[type=submit]:hover{
       background: #003366;
       opacity: 0.7;
     }
     nav {
       color:white;
       width:100%;
       padding:15px;
       background: green;
     }


    </style>
  </head>
  <body>
    <nav>
      <a href="home.php" style="color:white" > <p><b>HOME<b></p></a>
    </nav>

    <div class="wrap">
      <form class="" action="" method="post">


      <h2>Sign Up</h2>
      <input type="text" name="FirstName" placeholder="First Name" required>
      <input type="text" name="LastName" placeholder="Last Name" required>
      <input type="text" name="Email" placeholder="Email" required>
      <input type="text" name="mobilenumber" placeholder="Mobile Number" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit" value="Sign Up" name="rsign"><br><br>
        <?php
          if (isset($msg)) {
            // code...
            echo $msg;
          }

          if(isset($msg2)){
            echo $msg2;
          }
         ?>

        </form>

    </div>




  </body>
</html>
