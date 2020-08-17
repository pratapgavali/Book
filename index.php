
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
    <title>HOME</title>

    <meta name="veiwport" content="width=device-width, initial-scale=1.0">

    <style media="screen">

    body{
      background: url('books.jpg');
      background-size:cover;
      background-attachment: fixed;
      font-family: arial;
    }


      .top{

        max-width: 1300px;
        margin: auto;
        background: rgba(0, 0, 0, 0.8);
        box-sizing: border-box;
        padding: 20px;
        color:#fff;
        margin-top: 0%;
        margin-right: auto;
        opacity: 0.7;
        background: green;

      }
      .top h4{
        margin-left: 50px;
      }
      .top p{
          margin-left: 450px;
          margin-top: -40px;
      }
      .top p input[type="search"]{
        padding: 10px;
        width: 80%;
        border-color: rgba(255, 0, 0, 0.5);
        border-radius: 5px;
      }

      .top p input[type="submit"]{
        padding: 4px;
        width: 15%;
        border-color: rgba(255, 0, 0, 0.5);
        border-radius: 5px;
        color: blue;


        background: #60adde;
        opacity: 0.7;
        font-size:17px;
        color: #fff;


      }
      .top input[type=submit]:hover{
        background: #003366;
        opacity: 0.7;
      }



      .info{

        max-width: 1500px;
        margin: auto;
        background-color:rgba(255, 0, 0, 0.5);
        box-sizing: border-box;
        padding: 40px;
        color:#fff;
        margin-top: 5%;
        margin-right: auto;
        margin-bottom: -52px;
        font-size: 80%;
      }
      .contact{

        max-width: 1500px;
        margin: auto;
        background: rgba(0, 0, 0, 0.8);
        box-sizing: border-box;
        padding: 40px;
        color:#fff;
        margin-top: 5%;
        margin-right: auto;
        font-size: 80%;
        padding: 30px;
        color: white;
      }


      nav{
        background:#0082e6;
        background: green;
        height:120px;
        width:100%;
      }
      label.logo{
        background: skyblue;
        color:white;
        font-size:35px;
        line-height:80px;
        padding:0 100px;
        font-weight:bold;
        font-size:60px;
        padding-bottom: 30px;
        padding-top: 5px;
        border-bottom-right-radius:15px;
        border-top-left-radius: 15px;
        text-shadow: 10px 3px black;


      }

      nav ul{
      float:right;
      margin-right:auto;

    }
    nav ul li{
      display: inline-block;
      line-height:80px;
      margin:0 5px;
      margin-left: inherit;
    }
    nav ul li a{

      color:white;
      font-size:17px;
      padding:7px 13px;
      border-radius:3px;
      text-transform:uppercase;


    }

    a.active,a:hover{
      background:#1b9bff;
      background: rgba(255, 0, 0, 0.5);
      transition:.5s;
    }



    </style>

  </head>
  <body>
    <!--
    <div class="top" style="margin-left:-30px;">
      <tr>
        <a href="Profile.php" style="color:white"> <h4>PROFILE</h4></a>

        <a href="log_in.php" style="color:white; " > <h4>LOG IN</h4></a>
        <a href="Sign_up.php" style="color:white"> <h4>SIGN UP</h4></a>
        <p>
        <input type="search" name="find" value="" placeholder="search" style="">
        <input type="submit" name="click" value="search">
        </p>
      </tr>
    </div>
  -->

  <nav>
<?php


  if (isset($_SESSION['is_login'])) {

    echo '  <label class="logo"  ><img src="book4.jpg" height="50px" width="70px" style="box-shadow:5px 5px 0px black;" alt="">OobR</label>
       <p style="margin-top:-17px; margin-left:100px; text-shadow:3px 1px black; color:white; font-size:18px;" ><b>Online Old Book Reselling</b></p>
      <ul style="margin-top:-75px;">
        <li><a class="active" href="Profile.php">Profile</a> </li>
        <li><a href="About_us.php">About Us</a> </li>
      <!--  <li><a href="#">Contact</a> </li> -->
        <li><a href="Feedback.php">Feedback</a> </li>
      </ul>
    </nav>

      <div class="content">
      ';

  }

else {

  echo '  <label class="logo"  ><img src="book4.jpg" height="50px" width="70px" style="box-shadow:5px 5px 0px black;" alt="">OobR</label>
     <p style="margin-top:-17px; margin-left:100px; text-shadow:3px 1px black; color:white; font-size:18px;" ><b>Online Old Book Reselling</b></p>
    <ul style="margin-top:-75px;">
      <li><a class="active" href="Profile.php">Log In & Sign Up</a> </li>
      <li><a href="About_us.php">About us</a> </li>
      <li><a href="#"></a> </li>
    <!--  <li><a href="#">Contact</a> </li> -->
    <!--  <li><a href="Feedback.php">Feedback</a> </li> -->
    </ul>
  </nav>

    <div class="content">
    ';
  }
    ?>
      <!-- All current post -->
      <?php
      $sql1="SELECT *FROM book_post WHERE status='unbooked'";
      $result=$conn->query($sql1);



      if ($result->num_rows > 0) {
      while( $row=$result->fetch_assoc()){

          $_SESSION['id']=$row['post_id'];

          $_SESSION['bill']=$row['curr_price'];
          echo "<head>
          <style>
          .d1{
                border-top:5px solid white;
                padding-bottom:30px;
                border-bottom:5px solid white;
                margin-top:50px;
                color:white;
                font-size:120%;
                background:black;
                opacity:0.7;
                line-height:1%;
                width:100%;
         }
         input[type=submit]{
           width:25%;
           box-sizing: border-box;
           margin-top:30px;
           outline: none;
           background: red;
           border: none;
           opacity: 0.7;
           border-radius: 20px;
           font-size:20px;
           color: #fff;
           margin-top: 10px;
         }
          input[type=submit]:hover{
           background: green;
           opacity: 0.7;
         }
         textarea{

           font-size:70%;
         }

          </style>
          </head>
        <body >


          <div class='d1'>
          <p align='center' style='margin-bottom:-10px; padding-top:20px;'><td>".$row['b_name' ]."</td></p>
          <img src='".$row['b_image' ]."' height='150px' width='200px;' style='margin-left:30px;'>
          <center>
          <textarea rows='5' cols='70' style='background:black; font-size:100%; font-family:Arial; margin-top:-100px; margin-left:190px; color:white; border:none; text-align:center; padding-right:auto; ' readonly>".$row['descrip']."</textarea>
          </center>

          <p align='center' style='margin-top:px;'><td>".$row['curr_price']." &#8377</td></p>

          <form action='details.php' method='POST' >
          <center>
          <input type='hidden' name='id' value='".$row['post_id']."' >
          <input type='submit' name='ok' value='Buy Now' >
          </center>
          </form>
          </div> <br><br>

        </body>";


      }


      }
       ?>

    </div>

    <div class="info" align="bottom";>

      <p>
      <h4>Disclaimer </h4>
        Welcome to this Book Reselling System. Here users can sell and buy the old books, For this purpose user need to have an account on our site.
      Simply you have to create one account here filling some details. And believe that we don't share your personel information with anyone so don'
      care about it. We just want your details to provide best service to you. Because we are happy to help you!.

                                                                                          Thank you!
        </p>
        <p2>
      <h4> What you can do?</h4>
      This is the one E-commerce site where we providing platform to peoples to sell their old books and buy a old books also. So here seller can be
      gain some revenue by selling their old books, And the buyer can save their money, because we providing old books in the 50% price of new price
      of that book, Some delivery charges may be apply on the delivery.

    </p2>

    <h4>How you can do?</h4>

    <p3>
    For ths purpose you need to have one user account, which you can create filling some details like name, address,Contact etc. Don't worry! we never
      share your details with anyone, so be relax here. This information only for to provide best services to you.
        After account creation then you will on your profile, then if you want some changes in your profile then you can easily do it. if you want sell
      your books, then click on sell and the fill some other details like books image and provide your Contact details there and Simply post. then you
      can see that your your post will appear on the home page.
          If you want to be buy books then search for book on the home page and select buy option and then fill some details, and wait for the delivery.
          If you don't like our services then you can leave from there by deleting your account.

    </p3>

    </div>
    <div class="contact" align="bottom">
      <tr>
        <a href="#" style="color:white"> Contact</a>
        <a href="Feedback.php" style="color:white"> Feedback</a>
        <a href="#" style="color:white">About us  </a>
        <a href="Adminlog_in.php" accesskey="A"></a>
      </tr>

    </div>

  </body>
</html>
