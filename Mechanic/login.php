<?php
@include 'config.php';
if (isset($_POST['submit'])){ // this line of code checks if the ‘submit’ button of a form has been clicked
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']); //getting the password from a form input, hashing it using the MD5 algorithm, and then storing the hashed password in the variable
    $select = "SELECT * FROM admin_db WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    if(!$select_db){ echo 'Error selecting database.'; }
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_array($result);
       if($row['user_type']=='admin'){
        $_SESSION['admin_name'] = $row['name'];
       header('location:admin.php');
       }elseif($row['user_type'] == 'user'){
        $_SESSION['user_name']= $row['name'];
        header('location:user.php');
       }
       else{
        $error[]= 'Incorrect email or password!';
       }
       
};
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initail-scale=1.0">
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="style4.css">
    </head>
    <body>
        <div class="form-container">
            <form action="" method="post">
         <h3>Welcome to the <span style="color: crimson;"><br> login!</span></h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">' .$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>Don't have an account? <a href="register.php">Register now</a></p>
            </form>
        </div>
    </body>
</html>
