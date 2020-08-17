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
  if($_SESSION['is_login']==false){
    echo "<script> location.href='log_in.php' </script>";
  }
  if (isset($_REQUEST['ok'])) {
    // code...

      $b_id=$_SESSION['id'];

      $name=$_REQUEST['Name'];
      $email=$_REQUEST['email'];
      $mob_no=$_REQUEST['m_no'];
      $pin=$_REQUEST['pincode'];
      $addr=$_REQUEST['addr'];
      $date3=$_REQUEST['o_date'];
      $bill=$_SESSION['bill'];
      $sql="INSERT INTO orders (name,email,post_id,pincode,status,mob_no,addr,payment) VALUES ('$name','$email','$b_id','$pin','pending','$mob_no','$addr','$bill') ";
      $result=$conn->query($sql);
      if ($result) {
        echo "<script> location.href='myorder.php'</script> ";
      }
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


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

         </style>
       </head>
       <body align="center">

         <a href="Profile.php"> <h4 align="right" style="color:white; background:green; padding:20px; opacity:0.7; margin-top:-1px;">PROFILE</h4></a>
         <a href="home.php"><h4 align="left" style="color:white; opacity:0.7; padding:20px; margin-top:-80px; width:50px;">HOME</h4> </a>
         <div class="update1">
         <form class="" action="" method="post" enctype="multipart/form-data">
         <input type="text" name="Name" value="" placeholder="Name" required>

         <input type="text" name="email" value="" placeholder="Email (Enter Registered Email Only)">
         <input type="text" name="m_no" value="" placeholder="Mobile No" required>
         <input type="address" name="addr" value="" placeholder="Address" required>
         <input type="text" name="pincode" value="" placeholder="pincode" required>
         <input type="date" name="o_date" value="" required><br><br>
         <input type="submit" name="ok" value="Submit">
        </form>
          </div>
       </body>
     </html>

  </body>
</html>
