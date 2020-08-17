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
      }

      input[type="submit"]{
        background: red;
        width: 10%;
        padding: 7px;
        border-radius: 15px;
        border:none;

      }
      input[type="submit"]:hover{
        opacity: 0.7;
      }

    </style>
  </head>
  <body>


    <body>

      <a href="Profile.php"> <h4 align="right" style="color:white; background:green; padding:20px; opacity:0.7; margin-top:-1px;">PROFILE</h4></a>
      <a href="home.php"><h4 align="left" style="color:white; opacity:0.7; padding:20px; margin-top:-80px; width:50px;">HOME</h4> </a>

      <div class="info">
      <?php
      if ($_SESSION['is_login']) {
        // code...

    //  $id=$_SESSION['post_id'];
        $sql="SELECT *FROM book_post WHERE email='{$_SESSION["Email"]}'";
        $result=$conn->query($sql);
        if ($result->num_rows>0) {
          while($row=$result->fetch_assoc()){

              echo "<tr><td><center><img src=" .$row['b_image']. " height='500px' width='600px' border='3px solid red'></center></td>";

            echo "<table align='center' border='3px solid white' style='background:black; line-height:150%; color:white; text-align:left; font-size:25px;'>";


            echo "</tr><br>";

            echo "<tr><th>Book Name</th><td>" .$row['b_name']. "</td>";
            echo "</tr>";

            echo "<tr><th>Post Date</th><td>" .$row['date2']. "</td>";
            echo "</tr>";

            echo "<tr><th>New Price</th><td>" .$row['new_price']. "</td>";
            echo "</tr>";

            echo "<tr><th>Selling Price</th><td>" .$row['curr_price']. "</td>";
            echo "</tr>";

            echo "<tr><th>Mobile Number</th><td>" .$row['mob_no']. "</td>";
            echo "</tr>";

            echo "<tr><th>Email</th><td>" .$row['email']. "</td>";
            echo "</tr>";
            echo "</table><br><br>";
            echo "<form action='delete_post.php' method='POST'>";
            echo "<input type='hidden' name='post_id' value='".$row['post_id']."' >";
            echo "<center><input type='submit' name='delete' value='Delete Post'></center><br><br><br>";
            echo "</form>";


      /*    echo "<table style='color:white;'><theader><h3 align='center' >
          <img src=" .$row['b_image']. " height='200px' width='300px' border='3px solid red'></h3></theader>";

          echo "<br><br><tr>Book Name:-<td>" .$row['b_name']. "</td></tr>";
          echo "<tr>Post Date:-<td>" .$row['date2']. "</td></tr>";
          echo "<tr>New Price:-<td>" .$row['new_price']. "</td></tr>";
          echo "<tr>Selling Price:-<td>" .$row['curr_price']. "</td></tr>";
          echo "<tr>Mobile No:-<td>" .$row['mob_no']. "</td></tr>";
          echo "<tr>Email:-<td>" .$row['email']. "</td></tr>

          </table><br><br>";
        */
        }
        }

        }
       ?>

       </div>
    </body>

  </body>
</html>
