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
     <title>Total Post</title>
     <style media="screen">
       body{
         background: url('books.jpg');
         background-size:cover;
         font-family: arial;
         align-self: center;

       }

       input[type=submit]{

         width:auto;
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
         margin-left: 120px;
       }
       input[type=submit]:hover{
         background: #003366;
         opacity: 0.7;
       }

     </style>
   </head>
   <body>

    <!-- <table width="auto" border="2px" align="center" style="background:red; padding:10px; font-size:150%; margin-top:50px; ">-->
       <h1 style="color:white; margin-left:120px;"> Total Post </h1>
        <a href="changestatus.php"><input type="submit" name="change" value="Change Status"></a>


       <?php

       if (isset($_SESSION['is_login2'])) {
         // code...
         $sql="SELECT *From book_post";
         $result=$conn->query($sql);
         if ($result->num_rows>0) {
           while ($row=$result->fetch_assoc()) {
             echo "<table style='color:white; background:grey; border:3px solid black; width:70%;  margin-left:120px; font-size:25px;' border='3px' celspacing='0' cellpadding='0'>

             <tr> <th style='background:black'>Post ID</th><td>".$row['post_id']."</td> </tr>
             <tr><th  style='background:black'>Book Name</th><td>".$row['b_name']."</td> </tr>
             <tr>  <th  style='background:black'>Email</th><td>".$row['email']."</td></tr>
             <tr> <th  style='background:black'>New Pice</th><td>".$row['new_price']."</td></tr>

             <tr> <th  style='background:black'> Selling Price </th><td>".$row['curr_price']."</td></tr>
             <tr><th  style='background:black'> Status</th><td>".$row['status']."</td> </tr>
             <tr> <th style='background:black'>Address</th><td>".$row['s_address']."</td></tr>
             <tr> <th style='background:black'>Pincode</th><td>".$row['pincode']."</td></tr>
             <tr><th style='background:black'>Mobilr Number</th><td>".$row['mob_no']."</td></tr>
             <tr><th style='background:black'>Date</th><td>".$row['date2']."</td></tr><br><br>";

           echo "</table>";
         }
         }
       }
       else {
           echo "<script> location.href='Adminlog_in.php ' </script>";
       }

        ?>
        </center>

   </body>
 </html>
