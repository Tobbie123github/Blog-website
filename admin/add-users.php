<?php
include './components/header.php';

$firstname = $_SESSION["add-user-values"]["firstname"] ?? null;
$lastname = $_SESSION["add-user-values"]["lastname"] ?? null;
$username = $_SESSION["add-user-values"]["username"] ?? null;
$password = $_SESSION["add-user-values"]["password"] ?? null;

unset($_SESSION["add-user-values"]);
?>





<body class="body">
<div class="container">

  <div class="head-form" id='section'>
    <h3>ADD-USER</h3>
   <?php if(isset($_SESSION['add-user'])) :?>
   <div class="alert-msg error">
 <p><?= $_SESSION['add-user'];
      unset($_SESSION['add-user']);
      ?></p>
    </div>
    <?php endif ?>
  </div>

  <form action="./add-user-logic.php" method='POST' enctype="multipart/form-data">

    <div class="field-set">
      <input class="form-input" type="text" name="firstname" placeholder="FirstName" id="" value='<?=$firstname ?>'>
      <br>
      <input class="form-input" type="text" name="lastname" placeholder="LastName" id="" value='<?=$lastname ?>'>
      <br>
      <input class="form-input" type="text" name="username" placeholder="Username" id=""
     value='<?=$username ?>' >

      <br>

  <input class="form-input" type="password" name="password" placeholder="Password" id="pwd"
  value='<?=$password ?>'>
      <span>
        <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
      </span>
<br>
<label id="avatar" for="avatar">Choose an img
 <input type="file" name="avatar" id="avatar">
 </label>
    
        <br>
<select name="user-role" id="">
  <option value="0">Subscriber</option>
  <option value="1">Admin</option>
</select>

      <br>
      <input type="submit" value="Submit" class="submit-btn" name='submit'>
    </div>


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
<script src='../js/main.js'></script>
</body>

</html>
