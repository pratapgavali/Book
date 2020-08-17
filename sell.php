<?php


$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="obs";
$dbport="3306";

  $conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname,$dbport);
  if ($conn->connect_error) {
    die("connection failed!");
  }

  session_start();
  if ($_SESSION['is_login']) {

    if (!empty($_REQUEST['b_name'])) {
      $msg2= "<head><style>.c1{ padding:1px;border-radius:7px; text-align:center; margin-top:5px; }</style></head>
  <div class='c1' >All Fields Are Require!<div>";
    }

    if (isset($_REQUEST['upload'])) {


    $email=$_SESSION['Email'];
    $filename=$_FILES['photo']['name'];
    $tempname=$_FILES['photo']['tmp_name'];
    $folder= "b_image/".$filename;
    move_uploaded_file($tempname,$folder);
    $name=$_REQUEST['b_name'];
    $newprice=$_REQUEST['n_price'];
    $descri=$_REQUEST['info'];
    $curr_pri=$newprice/2;
    $addr=$_REQUEST['addr'];
    $pin=$_REQUEST['pincode'];
    $date1=$_REQUEST['p_date'];
    $mob_no=$_REQUEST['m_no'];

    $sql="INSERT INTO book_post (b_name,email,b_image,new_price,descrip,curr_price,s_address,pincode,date2,mob_no,status) VALUES ( '$name','$email','$folder','$newprice','$descri','$curr_pri','$addr','$pin','$date1',$mob_no,'unbooked')";
    $result=$conn->query($sql);
    if ($result) {
      echo "<script> location.href='Profile.php' </script>";
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

          .update1
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
            .update1 input[type=file]{
              padding: 12px 5px;
              margin: 5px;

              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;
              margin-left: -280px;
            }

            .update1 input[type=text]{
              padding:30px;
              margin-top: 5px;
              margin-left: -100px;
              margin-bottom: 50px;
              width:120%;
              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;


            }

            .update1 input[type=number]{
              padding:30px;
              margin-top: 5px;
              margin-right: 100px;
              margin-left: -175px;
              margin-bottom: 50px;
              width:60%;
              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;


            }

            .update1 input[type=address]{
              padding:30px;
              margin-top: 5px;
              margin-left: -100px;
              margin-bottom: 50px;
              width:120%;
              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;


            }

            .update1 input[type=date]{
              padding:30px;
              margin-top: 5px;
              margin-left: -260px;
              margin-bottom: 50px;
              width:60%;
              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;


            }


            .update1 input[type=submit]{
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
            }
            .update1 input[type=submit]:hover{
              background: #003366;
              opacity: 0.7;
            }
            textarea {

              padding:30px;
              margin-top: 5px;
              margin-left: -100px;
              margin-bottom: 50px;
              width:120%;
              outline: none;
              background: rgba(0,0,0,0.10);
              border:none;
              border-bottom: 3px solid #fff;
              border-radius: 5px;
              border-sizing:border-box;
              color:#fff;
              font-width:bold;
            }

     </style>
   </head>
   <body align="center">

     <a href="Profile.php"> <h4 align="right" style="color:white; background:green; padding:20px; opacity:0.7; margin-top:-1px;">PROFILE</h4></a>
     <a href="home.php"><h4 align="left" style="color:white; opacity:0.7; padding:20px; margin-top:-80px; width:50px;">HOME</h4> </a>
     <div class="update1">
    <form class="" action="" method="post" enctype="multipart/form-data">
      <?php if (isset($msg)) {
        echo $msg;
      }
      if (isset($msg2)) {
        echo $msg2;
      }
      ?>
     <input type="file" name="photo" value="" required>
     <input type="text" name="b_name" value="" placeholder="Book Name" required>
     <textarea name="info" rows="8" cols="80" placeholder="Discription: Enter Book Discription And Your Contact Details"></textarea>
     <!--<input type="text" name="info" placeholder="Discription: Enter Book Discription And Your Contact Details" required>-->
     <input type="text" name="email" value="" placeholder="Email">
     <input type="number" name="n_price" value="" placeholder="New Price in Ruppees" required>
    <!-- <input type="number" name="c_price" value="" placeholder="Sell Price" required> -->
     <input type="text" name="m_no" value="" placeholder="Mobile No" required>
     <textarea name="addr" rows="8" cols="80" placeholder="Address"></textarea>
     <!--<input type="address" name="addr" value="" placeholder="Address" required>-->
     <input type="text" name="pincode" value="" placeholder="pincode" required>
     <input type="date" name="p_date" value="" required><br><br>
     <input type="submit" name="upload" value="Upload">
    </form>
      </div>
   </body>
 </html>
