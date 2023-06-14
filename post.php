<?php 
include './components/header.php';

if(isset($_GET['id'])){
$id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
  $query= "SELECT * FROM posts WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $post = mysqli_fetch_assoc($result);
  
}else{
  header('location: ' . './blog.php');
  die();
}

?>
<body>
<section id="section">
<div class="post-container">
  <div class="post-img">
      <img src="./img/<?=$post['picture']?>" alt="img1">

  </div>
  <div class="contents">
    <h4>
        <?=$post['title'] ?>
    </h4>
     <p>
       <?= $post['body'] ?>
     </p>
  
     <?php
     $author_id = $post['author_id'];
   $author_query = "SELECT * FROM users WHERE id=$author_id";
$author_result = mysqli_query($connection, $author_query);
$author_post = mysqli_fetch_assoc($author_result);
?> 
   <div class="owner">
     <div class="nav-profile1">
       <img src="./img/<?= $author_post['avatar']?>" alt="" class="avatar1">
     </div>
     <div>
       <small>
By <?= "{$author_post['firstname']} {$author_post['lastname']} " ?></small>
       </small> <br>
          <small>
    <?= date("M d, Y - H:i", strtotime($post['date_time']))?>
          </small>
     </div>
   </div>
   
  </div>
</div>

<?php
include './components/footer.php';
?>