<?php
require './components/header.php';

$current_id = $_SESSION['user-id'];
$query = "SELECT * FROM users WHERE NOT id=$current_id";
$result = mysqli_query($connection, $query);
?>


<section id="section">
   
  
   <h3 class="container">MANAGE-USER</h3>
   <?php if(isset($_SESSION['add-user-success'])) : ?>
       <div class="alert-msg success">
         <p><?=$_SESSION['add-user-success'];
        unset($_SESSION["add-user-success"]); ?></p>
       </div>
       
       
  <?php elseif(isset($_SESSION['edit-user'])) : ?>
    <div class="alert-msg error">
         <p><?=$_SESSION['edit-user'];
        unset($_SESSION["edit-user"]); ?></p>
       </div>
       
       
       
    <?php elseif(isset($_SESSION['edit-user-success'])) : ?>
  <div class="alert-msg success">
         <p><?=$_SESSION['edit-user-success'];
        unset($_SESSION["edit-user-success"]); ?></p>
       </div>
  
  
    <?php elseif(isset($_SESSION['delete-user'])) : ?>
    <div class="alert-msg error">
         <p><?=$_SESSION['delete-user'];
        unset($_SESSION["delete-user"]); ?></p>
       </div>
       
       
       
  <?php elseif(isset($_SESSION['delete-user-success'])) : ?>
  <div class="alert-msg success">
         <p><?=$_SESSION['delete-user-success'];
        unset($_SESSION["delete-user-success"]); ?></p>
       </div>   
       
       
       
   <?php endif ?>
     
  <div class="container manage">
   <aside>
     <ul>
   <li>
         <a href="add-post.php">
           <span>
    <i class="fa-solid fa-pen"></i>      
           </span>
           <h6>Add blog Post</h6>
         </a>
       </li>

       <li>
         <a href="index.php" >
           <span>
       <i class="fa-solid fa-pen-to-square"></i>
           </span>
           <h6>Manage blog Posts</h6>
         </a>
       </li>

<?php if(isset($_SESSION['user-admin'])): ?>
       <li>
         <a href="add-users.php">
           <span>
      <i class="fa-solid fa-user-plus"></i>
           </span>
         <h6>Add User</h6>
         </a>
       </li>

       <li>
         <a href="manage-user.php" class="active">
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
     <th>Name</th>
     <th>Username</th>
     <th>Edit</th>
     <th>Delete</th>
     <th>Admin</th>
   </tr> 

 <?php while($user = mysqli_fetch_assoc($result)): ?>
    <tr>
 <td><?= "{$user['firstname']} {$user['lastname']}  "?></td>
      <td><?= $user['username'] ?></td>
      <td class="edit">
        <a href="./edit-user.php?id= <?=$user['id'] ?>" class="edit">Edit</a>
      </td>
      <td class="delete">      
      <a href="./delete-user.php?id= <?=$user['id'] ?>" >Delete</a>
      </td>
      <td>
  <?= $user['admin'] ? 'Yes' : 'No'?>
      </td>
    </tr> 
       <?php endwhile; ?>

</table>
<?php else: ?>
 <?=  header('location: ' . '../index.php') ?>
    <?php die(); ?>
     </div>
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