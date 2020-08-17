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
     <title>Total User</title>
     <style media="screen">
       body{
         background: url('books.jpg');
         background-size:cover;
         font-family: arial;
         align-self: center;
       }

       input[type="submit"]{
         width:80%;
         height: 30px;
         border-radius: 7px;
         background: red;
         border:none;
         color: white;
         margin-left: 10px;

       }

       input[type="submit"]:hover{
         opacity: 0.7;

       }

     </style>
   </head>
   <body><center>

     <table width="100%" border="2px" align="center" style="background:grey; padding:10px; font-size:150%; margin-top:50px; ">
       <h1> Total Users </h1>


       <tr style="background:black; color:white; border:none;"><th>ID</th> <th>First Name</th><th>Last Name</th><th>Email</th><th>Mobile Number</th><th>Action</th></tr>

       <?php

       if (isset($_SESSION['is_login2'])) {
         // code...
         $sql="SELECT id,fname,lname,mob_no,email From register";
         $result=$conn->query($sql);
         if ($result->num_rows>0) {
           while ($row=$result->fetch_assoc()) {
             echo "<center><tr><td>".$row['id']."</td> <td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['email']."</td><td>".$row['mob_no']."</td>
             <td>
             <form action='' method='POST'>
             <input type='hidden' name='del' value=".$row['id']." >
             <input type='submit' name='delete' value='Delete'>
             </form>
             </td>
             </tr>";



           }
           echo "</table>";
         }


         if (isset($_REQUEST['delete'])) {
           $id1=$_REQUEST['del'];
           $sql2="DELETE FROM register WHERE id='$id1'";
           $result=$conn->query($sql2);

         }
       }
       else {
           echo "<script> location.href='Adminlog_in.php ' </script>";
       }

        ?>
        </center>

   </body>
 </html>
