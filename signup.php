<?php
include 'config/constant.php';

$firstname = $_SESSION["signup-values"]["firstname"] ?? null;
$lastname = $_SESSION["signup-values"]["lastname"] ?? null;
$username = $_SESSION["signup-values"]["username"] ?? null;
$password = $_SESSION["signup-values"]["password"] ?? null;

unset($_SESSION["signup-values"]);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
      <!--GOGGLE FONTS --------->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://kit.fontawesome.com/835efb29a1.css" crossorigin="anonymous">
  <!-- Custom Styles -->
<script src="https://kit.fontawesome.com/835efb29a1.js" crossorigin="anonymous"></script>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="./css/style.css">

  
  
  
</head>


<body class="body">
<div class="container">
     
      <div class="head-form">
        <h3>SIGN-UP</h3>
  <?php 
  if(isset($_SESSION['signup'])): ?>
     <div class="alert-msg error">
         <p><?= $_SESSION["signup"];
         unset($_SESSION["signup"]);
         ?></p>
       </div>
      </div>
 <?php endif ?>
  <form action="sign-up-logic.php" enctype="multipart/form-data" method="POST">
      
      <div class="field-set">
 <input class="form-input" type="text" name="firstname" value="<?= $firstname ?>" id="" placeholder="Firstname">
 <br>
 <input class="form-input" type="text" name="lastname" value="<?= $lastname ?>" placeholder="LastName" id="">
 <br>
  <input class="form-input" type="text" name="username" value="<?= $username ?>" placeholder="Username" id="">

       <br>
        
 <input class="form-input" type="password" name="password" value="<?= $password ?>" placeholder="Password" id="pwd">
    <span>
  <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
 </span>
        <br>
   
<label id="avatar" for="avatar"><small>Choose img: </small>
 <input type="file" name="avatar" id="avatar">
 </label>
 
    
        <br>
 <input type="submit" name='submit' value="Submit" class="submit-btn">
      </div>
      
    <small>
    Have an account? <a href="signin.php">Signin</a>
  </small>
 
 
  </form>
</div>

<script>
  function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
  }
  
  function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
  }
  
  var pwShown = 0;
  
  document.getElementById("eye").addEventListener("click", function() {
    if (pwShown == 0) {
      pwShown = 1;
      show();
    } else {
      pwShown = 0;
      hide();
    }
  }, false);
</script>

</body>
</html>