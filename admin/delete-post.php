<?php
include '../config/database.php';

if(isset($_GET['id'])){
  $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
  $result= mysqli_query($connection,$query);
  $post = mysqli_fetch_assoc($result);
  
  if(mysqli_num_rows($result) ==1){
    $picture_name = $post['picture'];
    $targeted_directory = '../img/' . $picture_name;
    if($targeted_directory){
      unlink($targeted_directory);
      
  $query = "DELETE FROM posts WHERE id=$id LIMIT 1";
  $delete_result = mysqli_query($connection, $query);
  if(mysqli_errno($connection)){
    $_SESSION['delete-post']="Failed to delete Post";
  }else{
    $_SESSION['delete-post-success']="Post deleted successfully";
  }
    }
  }
  
}
header('location: ' . './index.php');
die();