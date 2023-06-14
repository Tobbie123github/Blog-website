<?php
include 'components/header.php';

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM users WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $user = mysqli_fetch_assoc($result);
  
}else{
header('location: ' . './manage-user.php');
  die();
}

?>


<body class="body">

<div class="container">
     
      <div class="head-form">
        <h3>EDIT-USER</h3>
       <?php if(isset($_SESSION['edit-user'])) :?>
       <div class="alert-msg error">
         <p><?=$_SESSION['edit-user'] ?></p>
       </div>
       <?php endif ?>
      </div>
     
 <form action="./edit-user-logic.php" method="POST">
      
      <div class="field-set">

        </span>
  <input type="hidden"  name="id" value="<?=$user['id']?>">
        
        <br>     
        
  <input class="form-input" type="text" name="firstname" placeholder="Firstname" id="" value="<?=$user['firstname']?>">
        
        <br>
        
<input class="form-input" type="text" name="lastname" placeholder="Lastname" value="<?=$user['lastname']?>">
<br>
 <select name="user-role" id="">
  <option value="0">Subscriber</option>
  <option value="1">Admin</option>
</select>
<br>
 <input type="submit" value="UPDATE" class="submit-btn" name="submit">
      </div>
      </form>
      
      
  <script src="../js/main.js"></script>    
</body>
</html>