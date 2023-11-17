<?php
    @include 'config.php';
    session_start();
    if(isset($_SESSION['user_name'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initail-scale=1.0">
    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel="stylesheet" href="style4.css">
     <meta http-equiv="refresh"
          content="2;  
                url=http://localhost:3000/booking.html">
    </head>
    <body>
        You will be redirected to the Booking Page in a moment. 
    <br>  
    If you are not redirected automatically,  
    <a href="http://localhost:3000/booking.html"> 
      click here 
    </a>. 
        <div class="container">
        <div class="content">
         <h3>Hi <span>Customer</span></h3>
         <h1>Welcome<span></span></h1>
         <a href="login.php" class="btn">Login</a>
         <a href="register.php" class="btn">Register</a>
         <a href="logout.php" class="btn">Logout</a>
         </div>
        </div>
    </body>
</html>
