<?php
include 'config/constant.php';

$username = $_SESSION['signin-values']['username'] ?? null;

unset($_SESSION['signin-values']);
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

  <!-------FONTAWESOME CDN----------->
  <link rel="stylesheet" href="https://kit.fontawesome.com/835efb29a1.css" crossorigin="anonymous">
  <!-- Custom Styles -->
<script src="https://kit.fontawesome.com/835efb29a1.js" crossorigin="anonymous"></script>

  <!-- Custom Styles -->
  <link rel="stylesheet" href="./css/style.css">

</head>

<body class="body">
<div class="container">
     
      <div class="head-form">
        <h3>SIGN-IN</h3>
        <?php if(isset($_SESSION["signup-success"])): ?>
       <div class="alert-msg success">
     <p><?= $_SESSION["signup-success"];
         unset($_SESSION["signup-success"]);?></p>
       </div>
      </div>
  <?php elseif(isset($_SESSION["signin"])): ?>
         <div class="alert-msg error">
         <p><?= $_SESSION["signin"];
         unset($_SESSION["signin"]);?></p>
       </div>
      </div>
     <?php endif ?>

  <form action="sign-in-logic.php" method='POST'>
      
      <div class="field-set">

        </span>
  <input class="form-input" type="text" name="username" placeholder="Username" id="" value='<?= $username ?>'>
        
        <br>
        
       <input class="form-input" type="password" name="password" placeholder="Password" id="pwd">
        
        <span>
       <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>

        </span>
 
    
        <br>
 <input type="submit" value="Submit" class="submit-btn" name='submit'>
      </div>
      
    <small>
    Don't have an account? <a href="signup.php">Signup</a>
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