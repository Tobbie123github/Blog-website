<?php 
include './components/header.php';

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM posts WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $post = mysqli_fetch_assoc($result);
  
}else{
  header('location: ' . './index.php');
  die();
}
?>

<body class="body">

<div class="container">
     
      <div class="head-form">
        <h3>EDIT-POST</h3>
     <?php if(isset($_SESSION['edit-post'])) : ?>
       <div class="alert-msg error">
    <p><?=$_SESSION['edit-post'];
    
    unset($_SESSION['edit-post']);?></p>
       </div>
       <?php endif ?>
      </div>
     
 <form action="./edit-post-logic.php" enctype="multipart/form-data" method="POST">
      <div class="field-set">

        </span>
        
 <input type="hidden"  name="id" value="<?=$post['id']?>">
 <input type="hidden" name="previous_picture" value="<?=$post['picture']?>">
  <input class="form-input" type="text" name="title" placeholder="Title" id="" value="<?= $post['title'] ?>">
        
        <br>
        
<textarea name="body" rows="10"class="form-input"placeholder="Body" required><?= $post['body'] ?></textarea>
<br>

<?php if(isset($_SESSION['user-admin'])):?>
 <input type="checkbox" id="featured" name="featured" value="1" checked>
<span class='featured'>Featured</span>
<?php endif ?>
<br>

<label id="picture" for="picture"><small>Select an img :</small>
 <input type="file" name="picture">
 </label>
 
 
 <input type="submit" value="Add-Post" class="submit-btn" name='submit'>
 </div>


</form>

<script src="../js/main.js"></script>
</body>
</html>