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
    $email=$_SESSION['Email'];


    $sql="SELECT *FROM orders WHERE email='".$email."' ";
    $result=$conn->query($sql);

  }

  else {
    echo "<script>location.href='log_in.php'</script>";
  }


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>My Orders</title>
     <style media="screen">
       body{
         background: url('books.jpg');
         background-size:cover;
         font-family: arial;
         color:white;
       }

       input[type=submit]{
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
         margin-top: 10px;
       }
        input[type=submit]:hover{
         background: #003366;
         opacity: 0.7;
       }
     </style>
   </head>
   <body>



     <a href="Profile.php"> <h4 align="right" style="color:white; background:green; padding:20px; opacity:0.7; margin-top:-1px;">PROFILE</h4></a>
     <a href="home.php"><h4 align="left" style="color:white; opacity:0.7; padding:20px; margin-top:-80px; width:50px;">HOME</h4> </a>
     <table border="3px solid white" width="auto" align="center" style="margin-top:20px; line-height:300%; font-size:20px; background:black; opacity:0.7" >

       <?php

       if ($result->num_rows>0) {
         while ($row=$result->fetch_assoc()) {
           $id=$row['order_id'];
           $name=$row['name'];
           $email=$row['email'];
           $addr=$row['addr'];
           $status=$row['status'];
           $payment=$row['payment'];
           $mob_no=$row['mob_no'];



       echo "
       <table border='3px solid black' align='center' height='500px' width='auto' style='background:black;'>
       <tr>
         <th>Post Id</th><td>$id</td>
       </tr>
       <tr>
         <th>Name</th><td> $name </td>
       </tr>
       <tr>
         <th>Email</th><td> $email </td>
       </tr>
       <tr>
         <th>Shipping Address</th><td> $addr </td>
       </tr>
       <tr>
         <th>Order Status</th><td>$status</td>
       </tr>
       <tr>
         <th>Your Total Bill Is</th><td>$payment &#8377 + 30 &#8377 delivery Charge. </td>

       </tr>
       <tr>
         <th>Mobile No</th><td> $mob_no </td>
       </tr><br><br><br>

     </table><br>
     <form action='cancel.php' method='POST' align='center'>
     <input type='hidden' name='id' value='$id'>
     <input type='submit' name='cancel' value='Cancel Order' align='bottom'><br><br>

    </form>";



    }
  }
?>
   </body>
 </html>
