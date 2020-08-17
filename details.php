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
            background-attachment: fixed;
            font-family: arial;
            color:white;

          }
          .info{

            max-width: 1500px;
            margin: auto;
            background-color:rgba(0, 0, 0, 0.8);
            box-sizing: border-box;
            padding: 40px;
            color:#fff;
            margin-top: 5%;
            margin-right: auto;
            margin-bottom: -52px;
          }

          .info input[type=submit]{
            width:25%;
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
          .info input[type=submit]:hover{
            background: #003366;
            opacity: 0.7;
          }

    </style>
  </head>
  <body>

    <a href="Profile.php"> <h4 align="right" style="color:white; background:green; padding:20px; opacity:0.7; margin-top:-1px;">PROFILE</h4></a>
    <a href="home.php"><h4 align="left" style="color:white; opacity:0.7; padding:20px; margin-top:-80px; width:50px;">HOME</h4> </a>

    <div class="info">
    <?php
    $id=$_SESSION['id'];
      $sql="SELECT b_image,b_name,email,new_price,descrip,curr_price,s_address,date2,mob_no FROM book_post WHERE post_id={$_REQUEST['id']}";
      $result=$conn->query($sql);
      if ($result->num_rows==1) {
        $row=$result->fetch_assoc();

        echo "<table ><theader><h3 align='center' ><img src=" .$row['b_image']. " height='200px' width='300px' border='3px solid red'></h3></theader> <tr>

        <br><br><h1 align='center'>" .$row['b_name']. "</h1></tr>
        <tr><h2 align='center' style='color:pink'> DESCRIPTION<br><br><textarea style='background:black; color:white; width:40%; line-height:auto; font-size:20px; text-align:center; font-family:arial; border:none;' readonly>" .$row['descrip']. " </textarea><h4 align='center'>DATE OF POST : " .$row['date2']. "</h4> </h3> <h2></tr>
        <tr> <h3 align='center' style='color:pink'>NEW PRICE: " .$row['new_price']. " &#8377 </h3> </tr>
        <tr> <h2 align='center' style='color:red'> YOU CAN BUY NOW: ".$row['curr_price']." &#8377<h2 align='center'> + 30 &#8377 delivery charge </tr>
        <tr> <h3 align='center' style='color:pink' >CONTACT TO SELLER <br><br> MOBILE NO:  " .$row['mob_no']. "<br>EMAIL: " .$row['email']. "  </h3> </tr>
        </table>";


      }
     ?>
     <center>
    <a href="order.php"> <input type="submit" name="buy" value="BUY NOW"></a>
   </center>
     </div>
  </body>
</html>
