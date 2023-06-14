<?php
include './components/header.php';

$title = $_SESSION["add-post-values"]["title"] ?? null;
$body = $_SESSION["add-post-values"]["body"] ?? null;

unset($_SESSION["add-post-values"]);
?>


<body class="body">

<div class="container">
     
      <div class="head-form">
        <h3>ADD-BLOG-POST</h3>
      <?php if(isset($_SESSION['add-post'])) :?>
       <div class="alert-msg error">
         <p><?=$_SESSION['add-post'];
         unset($_SESSION['add-post']);?></p>
       </div>
       <?php endif ?>
      </div>
     
 <form action="./add-post-logic.php" enctype="multipart/form-data" method="POST">
      <div class="field-set">

        </span>
  <input class="form-input" type="text" name="title" placeholder="Title" id="" value="<?=$title ?>">
        
        <br>
        
<textarea name="body" rows="10"class="form-input"placeholder="Body" required><?=$body ?></textarea>
<br>

<?php if(isset($_SESSION['user-admin'])):?>
 <input type="checkbox" id="featured" name="featured" value="1" checked>
<span class="featured">Featured</span>
<?php endif ?>
<br>

<label id="picture" for="picture">Choose an img
 <input type="file" name="picture">
 </label>
 <br>
 
 <input type="submit" value="Add-Post" class="submit-btn" name='submit'>
      </div>

<script src="../js/main.js"></script>
</body>
</html>