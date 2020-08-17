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
     <title> Delivered Orders </title>
     <style media="screen">
       body{
         background: url('books.jpg');
         background-size:cover;
         font-family: arial;
         align-self: center;
       }
     </style>
   </head>
   <body><center>

            <h1 style="color:white;"> Delivered Orders </h1>




       <?php
       if (isset($_SESSION['is_login2'])) {

         $sql="SELECT order_id,post_id,name,email,addr,mob_no,status From orders WHERE status='delivered'";

         $result=$conn->query($sql);
         if ($result->num_rows>0) {
           while ($row=$result->fetch_assoc()) {

             echo "<table border='3px solid black' width='auto' style='font-size:25px; background:grey;  color:white; text-align:left; '  >";
             echo "<center> <tr><th style='background:black;'>ORDER ID:-</th><td>".$row['order_id']."</td></tr>";

            echo " <tr><th style='background:black;'>POST ID:-</th><td>".$row['post_id']."</td></tr>";

          echo " <tr><th style='background:black;'>NAME:-</th><td>".$row['name']."</td></tr>";
          echo " <tr><th style='background:black;'>EMAIL:-</th><td>".$row['email']."</td></tr>";
          echo " <tr><th style='background:black;'>ADDRESS:-</th><td>".$row['addr']."</td></tr>";
          echo " <tr><th style='background:black;'>MOBILE NO:-</th><td>".$row['mob_no']."</td></tr>";
          echo " <tr><th style='background:black;'>STATUS:-</th><td>".$row['status']."</td></tr><br><br>";
           }
           echo "</table>";
         }

       }
       else {
           echo "<script> location.href='Adminlog_in.php ' </script>";
       }

        ?>
        </center></body>
 </html>
