<?php
include 'config/database.php';
if(isset($_SESSION['user-id'])){
  $id= filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
  $query= "SELECT avatar FROM users WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $avatar = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Responsive Blog Website</title>
  
  <!--GOGGLE FONTS --------->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">


<!-------FONTAWESOME CDN----------->
  <link rel="stylesheet" href="https://kit.fontawesome.com/835efb29a1.css" crossorigin="anonymous">
  <!-- Custom Styles -->
<script src="https://kit.fontawesome.com/835efb29a1.js" crossorigin="anonymous"></script>

<!-------SWIPER CDN----------->

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>


  <!-- Custom Styles -->
  <link rel="stylesheet" href="./css/style.css"> 
</head>

<body>

<nav>
 <div class="nav-container">
   <div class="logo">
     <div>
    <h5><a href="./index.php">MARSHALL</a>
      <span class="night-mode">
        <i class="fas fa-lightbulb" id="on"></i>
        </h5>
        </div>
   </div>
   
   <ul id="menu">
<li><a href="./blog.php">BLOG</a></li>
 <li><a href="./about.php">About</a></li>
 <li><a href="./contact.php">Contact</a></li>
 
 <?php if(isset($_SESSION['user-id'])): ?>
 <li class="nav-profile">
    <div class="avatar">
    <img src="<?='./img/' . $avatar['avatar']?>">
   </div>
   <ul>
   <li> <a href="./admin/index.php">Dashboard</a></li>
    <li> <a href="logout.php">Logout</a></li>
   </ul>

   <?php else: ?>
 <li><a href="signin.php">Signin</a></li> 
 <?php endif ?>
    
 </li>

   </ul>
   
   <div id="btns">
 <span id="open-btn"><i class="fa-solid fa-bars"></i></span>
 <span id="close-btn"><i class="fa-solid fa-xmark"></i></span>

   </div>
 </div>
</nav>