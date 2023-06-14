<?php
include './components/header.php';

$current_id = $_SESSION['user-id'];
 $query = "SELECT id, title FROM posts WHERE author_id = $current_id ORDER BY id";
  $result= mysqli_query($connection,$query);

?>


<section id="section">
  <h3 class="container">MANAGE-BLOG-POST</h3>
 <?php if(isset($_SESSION['add-post'])):
   ?>
       <div class="alert-msg error">
         <p><?= $_SESSION['add-post'] ;
        
   unset($_SESSION['add-post']) ;?></p>
       </div>

<?php elseif(isset($_SESSION['add-post-success'])):
   ?>
       <div class="alert-msg success">
         <p><?= $_SESSION['add-post-success'] ;
        
   unset($_SESSION['add-post-success']) ;?></p>
       </div>
   
  <?php elseif(isset($_SESSION['edit-post'])):
   ?>
    <div class="alert-msg error">
         <p><?= $_SESSION['edit-post'] ;
        
   unset($_SESSION['edit-post']) ;?></p>
   </div> 
   
   <?php elseif(isset($_SESSION['edit-post-success'])):
   ?>
    <div class="alert-msg success">
         <p><?= $_SESSION['edit-post-success'] ;
        
   unset($_SESSION['edit-post-success']) ;?></p>
   </div>
  
     <?php elseif(isset($_SESSION['delete-post'])):
   ?>
    <div class="alert-msg error">
         <p><?= $_SESSION['delete-post'] ;
        
   unset($_SESSION['delete-post']) ;?></p>
   </div> 
   
   <?php elseif(isset($_SESSION['delete-post-success'])):
   ?>
    <div class="alert-msg success">
         <p><?= $_SESSION['delete-post-success'] ;
        
   unset($_SESSION['delete-post-success']) ;?></p>
   </div>
    <?php endif; ?> 
  <div class="container manage">
   <aside>
     <ul>
   <li>
         <a href="./add-post.php">
           <span>
       <i class="fa-solid fa-pen"></i>
           </span>
           <h6>Add blog Post</h6>
         </a>
       </li>

       <li>
         <a href="./index.php" class="active" >
           <span>
  <i class="fa-solid fa-pen-to-square"></i>    
           </span>
           <h6>Manage blog Posts</h6>
         </a>
       </li>

<?php if(isset($_SESSION['user-admin'])): ?>
       <li>
         <a href="./add-users.php">
           <span>
      <i class="fa-solid fa-user-plus"></i>
           </span>
         <h6>Add User</h6>
         </a>
       </li>

       <li>
         <a href="./manage-user.php">
           <span>
            <i class="fa-solid fa-person"></i>
           </span>
        <h6>Manage Users</h6>
         </a>
       </li>
<?php endif ?>
     </ul>
   </aside> 
    
    
 <?php if(mysqli_num_rows($result) > 0):?>  
   <table>
   <tr>
     <th>Title</th>
     <th>Edit</th>
     <th>Delete</th>
   </tr> 
   
 <?php while($posts = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?=$posts['title'] ?></td>
      <td class="edit">
        <a href="./edit-post.php?id= <?=$posts['id'] ?>">Edit</a>
      </td>
      <td class="delete">      
      <a href="./delete-post.php?id=<?=$posts['id'] ?>">Delete</a>
      </td>
    </tr> 
<?php endwhile; ?>
   </table> 
 <?php else: ?>
  <?=  header('location: ' . '../index.php') ?>
  <?php die(); ?>
   <?php endif; ?>
  </div>
  
 <?php if(isset($_SESSION['user-id'])): ?>
  <div class="control">
        <span id="open">
          >
        </span>
 
        <span id="close">
          <
        </span>
  </div>
  <?php endif; ?>

  
</section>

<script src="../js/main.js"></script>
</body>
</html>