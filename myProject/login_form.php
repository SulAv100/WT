<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $password = $_POST['password'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
        $_SESSION['usermail'] = $email;
        header('location:header.php');
      } else {
        $error[] = 'Incorrect password.';
      }
   }else{
      $error[] = 'User with this email does not exist.';
   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
   background: url('background.jpg') center center / cover no-repeat fixed;
}

.form-container {
   background-color: rgba(255, 255, 255, 0.3);
   padding: 50px;
   border-radius: 15px;
   width: 400px;
   position: absolute;
   margin: 0 auto;
   left: 35%;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
   margin-top: 150px;
}

.title {
   font-size: 30px;
   text-align: center;
   position: relative;
   margin: 0 auto;
   top: -30px;
   margin-top: 0;
   font-family: 'Montserrat', sans-serif;
}

.form-container:hover {
  background-color: rgba(255, 255, 255, 0.2);
}
.form-container:hover:before {
  opacity: 1;
}

.form-container:before {
   content: "";
   position: absolute;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   z-index: -1;
   background-image: url('background.jpg');
   background-size: cover;
   background-position: center center;
   filter: blur(15px);
   transform: scale(1.1);
}

.box {
   width: 100%;
   max-width: 400px;
   padding: 10px;
   margin-bottom: 20px;
   border: none;
   background-color: rgba(255, 255, 255, 0.8);
   box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
   border-radius: 5px;
   font-size: 16px;
   color: #333;
}

.form-container .error-msg {
   display: block;
   margin-bottom: 10px;
   color: #ff0000;
   font-weight: bold;
}

.form-container .form-btn {
   display: block;
   width: 100%;
   padding: 10px;
   margin-top: 20px;
   border: none;
   border-radius: 5px;
   background-color: #ff6600;
   color: #fff;
   font-size: 18px;
   cursor: pointer;
   transition: all 0.3s ease;
}

.form-container .form-btn:hover {
   background-color: black;
}

.form-container p {
   margin-top: 20px;
   font-size: 14px;
   color: #666;
}

.form-container p a {
   color: #333;
   font-weight: bold;
   text-decoration: none;
}

.form-container p a:hover {
   text-decoration: underline;
}


    </style>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">login now</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
        <input type="email" name="usermail" placeholder="enter your email" class="box" required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="submit" value="login now" class="form-btn" name="submit">
        <p>don't have an account? <a href="index.php">register now!</a></p>
    </form>

</div>

</body>
</html>