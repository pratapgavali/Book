
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



    if (isset($_REQUEST['store'])) {

      if (($_REQUEST['info'])=="") {
        $msg1="<head><style>.c1{ background-color:rgba(255, 0, 0, 0.5); padding:2px;border-radius:7px; text-align:center; margin-top:12px; }</style></head>
        <div class='c1' >Please Fill The Feedback Feild!<div> ";
        // code...
      }
      else {
        // code...

      // code...
      $feed=$_REQUEST['info'];
      $date1=$_REQUEST['date'];

      $sql="INSERT INTO feedback (feed,email,date1) VALUES ('$feed','$email','$date1')";
      $result=$conn->query($sql);
      if($result){
      /*  $msg=" <head><style>.c1{ background-color:rgba(255, 0, 0, 0.5); padding:2px;border-radius:7px; text-align:center; margin-top:12px; }</style></head>
        <div class='c1' >Thanks for the feedback.!<div>"; */
      }
    }
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
    <title></title>

    <style media="screen">

    body{
      background: url('books.jpg');
      background-size:cover;
      font-family: arial;
    }

    .top1{

      max-width: 1300px;
      margin: auto;
      background: rgba(0, 0, 0, 0.8);
      box-sizing: border-box;
      padding: 5px;
      color:#fff;
      margin-top: 0%;
      margin-right: auto;
      opacity: 0.7;
      background: green;
      font-size: 23px;


    }

    .top2{
        margin-top: -60px;
        margin-right: 50px;
    }

    .top2 h2{
      margin-top: -60px;
    }

   .top
     {
       max-width: 350px;
       margin: auto;
       background: rgba(0, 0, 0, 0.8);
       box-sizing:auto;

       padding: 150px;
       color:#fff;
       margin-top: 5%;
       margin-right: auto;


     }

     .top input[type=text]{
       padding:80px;
       margin-top: 5px;
       margin-left: -100px;
       margin-bottom: 50px;
       width:120%;
       outline: none;
       background: rgba(0,0,0,0.10);

       border-bottom: 3px solid #fff;
       border-radius: 5px;
       border-sizing:border-box;
       color:#fff;
       font-width:bold;


     }


     .top input[type=submit]{
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
       margin-left: 22%;

     }
     .top input[type=submit]:hover{
       background: #003366;
       opacity: 0.7;
     }

     .top p input[type=text]{
       padding:20px;
       margin-top: 5px;
       margin-left: px;
       margin-bottom: 50px;
       width:50%;
       outline: none;
       background: rgba(0,0,0,0.10);

       border-bottom: 3px solid #fff;
       border-radius: 5px;
       border-sizing:border-box;
       color:#fff;
       font-width:bold;
     }

     .top p input[type=date]{
       padding:20px;
       margin-top: 5px;
       margin-left: -100px;
       margin-bottom: 50px;
       width:50%;
       outline: none;
       background: rgba(0,0,0,0.10);

       border-bottom: 3px solid #fff;
       border-radius: 5px;
       border-sizing:border-box;
       color:#fff;
       font-width:bold;
     }

    .top textarea{
       background: black;
       color: white;
       margin-left: -100px;
       padding-bottom: 20px;
       margin-bottom: 30px;
     }


    </style>

  </head>
  <body>
    <div class="top1">



      <table>
      <tr>
      <a href="home.php" ><h4 style="color:white">HOME</h4> </a>

      <div class="top2">

      <a href="profile.php" align="right" ><h4 style="color:white">PROFILE</h4> </a>

        <h2 align="center">FEEDBACK</h2>
      </div>
      </tr>
      </table>
    </div>

    <div class="top">
      <form class="c1" action="" method="post" >


    <textarea name="info" rows="8" cols="50" placeholder="Discription:" required></textarea>
    <p>
      <input type="text" name="email" value="<?php  echo $email; ?> " placeholder="Email" readonly><br><br>
      <input type="date" name="date" value="auto" placeholder="" required>
    </p>
    <input type="submit" name="store" value="Submit"><br><br>
    <!--
   <?php if (isset($msg)) {
      // code...
      echo $msg;
    }
    if (isset($msg1)) {
      echo $msg1;
    }

     ?>

   -->
      </form>

</div>
        <?php
        echo "<h2 style='color:white'>Recent Feedbacks</h2>";
        $sql1="SELECT *FROM feedback";
        $result=$conn->query($sql1);
        while ($row=$result->fetch_assoc()) {

          echo "<table style='border-bottom:3px solid white;'>";
          echo "<br><br><textarea name='feed' rows='auto' cols='50' style='background:none; color:white; border:none; ' readonly>".$row['feed']."</textarea><br>";
          echo "<p style='color:white; ' >Posted By:</p>  <input type='text' name='mail' value='" .$row['email']."' style='background:none; color:white; font-size:15px; border:none; float:left;' readonly><br>";
          echo "<input type='text' name='date' value='".$row['date1']."'  style='background:none; color:white; border:none; font-size:15px; margin-top:-18px; float:left; ' readonly><br><br><br><br>";
          echo "</table>";

        }

         ?>




  </body>
</html>
