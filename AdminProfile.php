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
  if($_SESSION['is_login2']){
    $email=$_SESSION['Email2'];
    $sql="SELECT name from admin WHERE email='$email'";
    $result=$conn->query($sql);
    if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $name = $row['name'];

      $sql1="SELECT COUNT(*) FROM orders WHERE status='delivered'";
      $result1=$conn->query($sql1);
      $row1=$result1->fetch_row();
      $delivered=$row1[0];

      $sql1="SELECT COUNT(*) FROM orders WHERE status='pending'";
      $result1=$conn->query($sql1);
      $row1=$result1->fetch_row();
      $pending=$row1[0];

      $sql1="SELECT COUNT(id) FROM register";
      $result1=$conn->query($sql1);
      $row1=$result1->fetch_row();
      $assi=$row1[0];

      $sql1="SELECT COUNT(post_id) FROM book_post";
      $result1=$conn->query($sql1);
      $row1=$result1->fetch_row();
      $orders=$row1[0];


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
    <title>Dashboard</title>
    <style media="screen">

        body{
          background: url('books.jpg');
          background-size:cover;
          font-family: arial;
        }

        .wrap1{
          max-width: 1000px;
          margin: auto;
          background: rgba(0, 0, 0, 0.8);
          box-sizing: 100%;
          padding: 40px;
          color:#fff;

          margin-right: auto;
        }


      h1{

        background-color:green;
        padding: 10px;

      }

      .c1 input[type=text]{
        padding: 10%;
        margin-right:20px;
        width:2%;
        opacity: 0.7;
        outline: none;
        background: rgba(0,0,0,0.10);

        border: 3px solid #fff;
        border-radius: 5px;
        border-sizing:border-box;
        color:#fff;
        font-width:bold;
        text-align: center;
      }

      .logout input[type=submit]{
        width:20%;
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
      }
      .logout input[type=submit]:hover{
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


      .c3 input[name=total]{
        background: orange;
        font-size: 20px;
        border: none;
      }
      .c3 input[name=pending]{
        background: red;
        font-size: 20px;
        border: none;
      }
      .c3 input[name=delivered]{
        background: green;
        font-size: 20px;
        border: none;
      }
      .c3 input[name=posts]{
        background: blue;
        font-size: 20px;
        border: none;
      }
      .c3 input[type=text]:hover{
        opacity: 50;
      }

    </style>
  </head>
  <body>


    <div class="wrap2"> <!-- wrap2 class start  -->
    <tr>
      <a href="home.php"> <p style="color:skyblue"><b> HOME </b></p></a>
    </tr>
  </div>   <!-- wrap2 class close  -->


    <div class="wrap1">  <!-- wrap1 class start  -->
    <h1 align="center" style="color:pink" >ADMIN DASHBOARD</h1><br>
    <center>

      <div class="c1">  <!-- c1 class start  -->
        <table>
          <tr>
            <td><h2 style="margin-left:5px; padding-right:120px;">Total User</h2></td>
             <td> <h2 style="margin-right: 50px;">Delivered Orders</h2> </td>
              <td><h2 style="margin-right:20px"> Pending Orders</h2></td>
              <td><h2 style="margin-right:50px; padding-left:60px;">Total Post</h2></td>
            </h2>
          </tr>
          </table>

          <div class="c3"> <!-- c3 class start  -->
            <a href="total_user.php" > <input type="text" value=" <?php  echo $assi; ?> " name="total" readonly> </a>
            <a href="delivered_order.php" >  <input type="text" value=" <?php echo $delivered; ?> " name="delivered" readonly></a>
            <a href="pending_order.php" >  <input type="text" value=" <?php echo $pending; ?> " name="pending" readonly></a>
            <a href="total_post.php" >  <input type="text" value=" <?php echo $orders; ?> " name="posts" readonly></a>
          </div> <!-- c3 class close  -->

        </div>  <!-- c1 class close  -->


     <div class="logout"> <!-- logout class start  -->
      <br><br><a href="Adminlogout.php"><input type="submit" value="Log Out" name="logout"></a>
    </div> <!-- logout class close  -->


  </center>
</div>  <!-- wrap2 class close  -->


  </body>
</html>
