<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['usermail'])){
   header('location:login_form.php');
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
         background-color: #f5f5f5;
         font-family: Arial, sans-serif;
         color: #333;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
      }
      
      .container {
         background-color: rgba(255, 255, 255, 0.8);
         padding: 20px;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
         text-align: center;
         animation: slide-in 0.5s ease-out;
      }
      
      h3 {
         font-size: 24px;
         margin-bottom: 10px;
         color: #333;
         text-transform: uppercase;
         letter-spacing: 1px;
      }
      
      p {
         font-size: 18px;
         margin-bottom: 20px;
      }
      
      span {
         font-weight: bold;
      }
      
      .logout {
         display: inline-block;
         padding: 10px 20px;
         background-color: #333;
         color: #fff;
         text-decoration: none;
         border-radius: 5px;
         transition: background-color 0.2s ease-out;
      }
      
      .logout:hover {
         background-color: #555;
      }
      
      @keyframes slide-in {
         from { transform: translateY(-100px); opacity: 0; }
         to { transform: translateY(0); opacity: 1; }
      }
   
   </style>
</head>
<body>
    
<div class="container">
   <div class="content">
      <h3>Welcome yo my website</h3>
      <p>your email : <span><?php echo $_SESSION['usermail']; ?></span></p>
      <a href="logout.php" class="logout">logout</a>
   </div>
</div>

</body>
</html>