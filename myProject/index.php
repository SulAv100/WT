<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    
   $email = filter_var($_POST['usermail'], FILTER_SANITIZE_EMAIL);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

   // Check if the email is valid
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Invalid email format';
   } else {
      // Check if the email already exists in the database
      $select = "SELECT * FROM user_form WHERE email = ?";
      $stmt = $conn->prepare($select);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if($result->num_rows > 0){
         $error[] = 'User already exists';
      } else {
         // Check if the password and confirm password match
         if($password != $cpassword){
            $error[] = 'Passwords do not match';
         } else {
            // Hash the password using bcrypt
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert the user email and hashed password into the database
            $insert = "INSERT INTO user_form (email, password) VALUES (?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ss", $email, $hashed_password);
            $stmt->execute();

            $_SESSION['success'] = 'Registration successful';
            header('location: login_form.php');
            exit();
         }
      }
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
      
      body {
   background-image: url('background.jpg');
   background-size: cover;
   background-position: center center;
   background-repeat: no-repeat;
   background-attachment: fixed;
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
.form-container .title {
   font-size: 30px;
   font-family: 'Pacifico', cursive;
   margin-top: -20px;
   text-align: center;
   color: black;
   
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
   background-color: #5F9EA0;
  background-color: #ff6600; /* change to your desired color */
  color: #fff; /* change to your desired text color */
   font-size: 18px;
   cursor: pointer;
   transition: all 0.3s ease;
}
.form-container .form-btn:hover {
   background-color: black;
}


.form-btn-container {
   display: flex;
   justify-content: center;
   align-items: center;
}
.shake {
  animation: shake 0.5s linear;
}

@keyframes shake {
  0% {
    transform: translateX(0);
  }
  20% {
    transform: translateX(-10px);
  }
  40% {
    transform: translateX(10px);
  }
  60% {
    transform: translateX(-10px);
  }
  80% {
    transform: translateX(10px);
  }
  100% {
    transform: translateX(0);
  }
}


   </style>
</head>
<body>
    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">register now</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="enter your email" class="box" required>
      <input type="password" name="password" placeholder="enter your password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p style="text-align: center;">
   <span style="color: #999;">already have an account? </span> 
   <a href="login_form.php" style="color: #fff; text-decoration: none; font-weight: bold; border-bottom: 2px solid #fff;">login now!</a>
</p>
   </form>

</div>
<script>
   const formContainer = document.querySelector('.form-container');
const emailField = document.querySelector('input[name="usermail"]');
const passwordField = document.querySelector('input[name="password"]');
const cPasswordField = document.querySelector('input[name="cpassword"]');

// Add event listener to the submit button
document.querySelector('.form-btn').addEventListener('click', (e) => {
  // Check if email is valid
  if (!emailField.checkValidity()) {
    e.preventDefault();
    emailField.classList.add('shake');
    setTimeout(() => {
      emailField.classList.remove('shake');
    }, 500);
  }
  
  // Check if password and confirm password match
  if (passwordField.value !== cPasswordField.value) {
    e.preventDefault();
    passwordField.classList.add('shake');
    cPasswordField.classList.add('shake');
    setTimeout(() => {
      passwordField.classList.remove('shake');
      cPasswordField.classList.remove('shake');
    }, 500);
  }
});
</script>

</body>
</html>