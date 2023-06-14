<?php
include '../config/database.php';

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $user = mysqli_fetch_assoc($result);
  
  // remove picture
  if(mysqli_num_rows($result) ==1){
    $avatar_name = $user['avatar'];
    $targeted_directory = '../img/' . $avatar_name;
    if($targeted_directory){
      unlink($targeted_directory);
    }
  }
  
  
  /// TO DELETE POSTS
  
  
  
  // to delete user
  $query = "DELETE FROM users WHERE id=$id";
  $delete_result = mysqli_query($connection, $query);
  
  if(mysqli_errno($connection)){
    $_SESSION['delete-user']="Failed to delete User: $firstname $lastname";
  }else{
    $_SESSION['delete-user-success']="{$user['firstname']}  {$user['lastname']} deleted successfully";
  }
  }

header('location: ' . './manage-user.php');
die();
