<?php
    @include 'config.php';
    session_start();
    if(isset($_SESSION['admin_name'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initail-scale=1.0">
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style4.css">
    </head>
    <body>
        <div class="container">
        <div class="content">
         <h3>Hi <span>Admin</span></h3>
         <h1>Welcome<span></span></h1>
        
         <a href="login.php" class="btn">Login</a>
         <a href="register.php" class="btn">Register</a>
         <a href="logout.php" class="btn">Logout</a>
         </div>
        </div>
    </body>
</html>
