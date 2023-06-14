<?php
include './components/header.php';
$get_all_post_query= "SELECT * FROM posts ORDER BY date_time DESC";
$get_all_post_result = mysqli_query($connection, $get_all_post_query);
?>
  

<!--.  SECTION ----------->
 <section id='blogs'>
   <div class="container blogs">
<?php while($get_post = mysqli_fetch_assoc($get_all_post_result)):?>
     <div class="first-blog">
     <div class="image2">
       <img src="./img/<?=$get_post['picture'] ?>" alt="img2">
     </div>
     <div>
     
   <h4>
   <?= $get_post['title']?></h4>
   <p> <?= substr($get_post['body'],0 ,150)?>....</p>
   
   
    <div class="owner">
           <?php
     $author_id = $get_post['author_id'];
   $author_query = "SELECT * FROM users WHERE id=$author_id";
$author_result = mysqli_query($connection, $author_query);
$author_post = mysqli_fetch_assoc($author_result);
?>
     <div class="nav-profile1">
       <img src="./img/<?=$author_post['avatar'] ?>" alt="img" class="avatar1">
     </div>
     
     <div>
       <small>By <?= "{$author_post['firstname']} {$author_post['lastname']} " ?></small><br>
          <small>
       <?= date("M d, Y - H:i", strtotime($get_post['date_time']))?>
          </small>
     </div>
   </div>
      </div>
          <div>
     <small class="read-more"><a href='./post.php?id=<?=$get_post['id'] ?>' class=''>Read More</a></small>
   </div>
     </div>
<?php endwhile ?>
   </div>
 </section>
<?php
include './components/footer.php';
?>