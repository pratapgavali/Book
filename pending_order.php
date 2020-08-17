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
     <title>Pending Orders</title>
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
     <table width="100%" border="2px" align="center" style="background:grey; padding:10px; font-size:150%; margin-top:50px; ">
       <h1 style="color:white"> Pending Orders </h1>

       <tr style="background:black; border:none; color:white; cellspacing:'0'"><th>Order ID</th> <th>Post ID</th><th>Name</th><th>Email</th><th>Address</th><th>Mobile Number</th><th>Status</th> </tr>

       <?php

       if (isset($_SESSION['is_login2'])) {
         // code...
         $sql="SELECT order_id,post_id,name,email,addr,mob_no,status From orders WHERE status='pending'";
         $result=$conn->query($sql);
         if ($result->num_rows>0) {
           while ($row=$result->fetch_assoc()) {
             echo "<center><tr><td>".$row['order_id']."</td> <td>".$row['post_id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>" .$row['addr']. "</td><td>".$row['mob_no']."</td><td>".$row['status']."</td></td></tr>
";
           }
           echo "</table>";
         }
       }
       else {
           echo "<script> location.href='Adminlog_in.php ' </script>";
       }

        ?>
        </center>

   </body>
 </html>
