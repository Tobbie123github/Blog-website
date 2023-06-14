<?php
include 'components/header.php';

$featured_post_query = "SELECT * FROM posts WHERE featured=1";
$featured_post_result = mysqli_query($connection, $featured_post_query);
$featured_post = mysqli_fetch_assoc($featured_post_result);



$get_all_post_query= "SELECT * FROM posts ORDER BY date_time DESC LIMIT 6";
$get_all_post_result = mysqli_query($connection, $get_all_post_query);


?>





<!-------------CONTENTS ---------------->

<header>
  <?php if(mysqli_num_rows($featured_post_result) == 1) :?>
  <div class="container">
    
    <div class="first-part">
    <h4>
      Featured Article
    </h4>
   </div> 
    
   <!--INTRO END ---------------->

<div class="second-head">
  <div class="header-img">
      <img src="./img/<?=$featured_post['picture'] ?>" alt="img1">

  </div>
  <div class='featured-content'>
    <h3>
        <?= $featured_post['title']?>
    </h3>
     <p>
       <?= substr($featured_post['body'] , 0 , 300) ?>...
     </p>

 <div class="owner">
    <?php
  $author_id = $featured_post['author_id'];
   $author_query = "SELECT * FROM users WHERE id=$author_id";
$author_result = mysqli_query($connection, $author_query);
$author_post = mysqli_fetch_assoc($author_result);
?>
     <div class="nav-profile1">
       <img src="./img/<?=$author_post['avatar'] ?>" alt="img" class="avatar1">
     </div>
     
     <div>
  <small>By <?= "{$author_post['firstname']} {$author_post['lastname']} " ?></small>
          <small>
            <br>
            <?= date("M d, Y - H:i", strtotime($featured_post['date_time']))?>
          </small>
     </div>
   </div>
   <!--- READ MORE -->
   <div>
     <p class="read-more"><a href='./post.php?id=<?=$featured_post['id'] ?>' class=''>Read More</a></p>
   </div>
  </div>
</div>
  </div>
  <?php else: ?>
     <div class="alert-msg error">
<h4 class=''><?= 'NO FEATURED POST'?></h4>
    </div>
<?php endif ?>
</header>




<!--------------SECTION---------------->
 <section>
   <div class="container blogs">
<?php while($get_post = mysqli_fetch_assoc($get_all_post_result)):?>
     <div class="first-blog">
     <div class="image2">
       <img src="./img/<?=$get_post['picture'] ?>" alt="img2">
     </div>
     <div>
     
<h4><?= $get_post['title']?> </h4>
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
       <small>By <?= "{$author_post['firstname']} {$author_post['lastname']} " ?></small>
       <br>
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
<? endwhile ?>
   </div>
 </section>

<?php
include './components/footer.php';
?>