<?php
@include 'config.php';
if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
    $select = "SELECT * FROM admin_db WHERE email = '$email' && password = '$pass' ";
    $result = mysqli_query($conn, $select);
    //if(!$select_db){ echo 'Error selecting database.'; }
    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO admin_db(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initail-scale=1.0">
    <meta charset="UTF-8">
    <title>Register page</title>
    <link rel="stylesheet" href="style4.css">
    </head>
    <body>
        <div class="form-container">
            <form action="" method="post">
         <h3>Welcome to the <span style="color: crimson;">registration!</span></h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">' .$error.'</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="Enter your name">
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="password" name="cpassword" required placeholder="Confirm your password">
         <select name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
         </select>
         <input type="submit" name="submit" value="Register Now" class="form-btn">
         <p>Already have an account? <a href="login.php">login now</a></p>
            </form>
        </div>
        <script type='text/javascript'>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();
           // var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var age = document.getElementById('age').value;
            var password = document.getElementById('password').value;
            var username = document.getElementById('username').value;
           // var message = document.getElementById('message').value;
            var userType = document.getElementById('userType').value;
            
            if ( name === '' || email === '' || password === '' || cpassword === '') {
                alert('Please fill all the fields.');
                return false;
            }
            if (!/^[a-z0-9]*$/.test(password)) {
                alert('Password should only contain lowercase alphabets and numbers.');
                return false;
            }
    alert('You, ' + name + ', have successfully registered as ' + user_type + '.');
            //window.location.reload();
        });
    </script>
    </body>
</html>
