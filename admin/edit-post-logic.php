<?php 
include '../config/database.php';

if(isset($_POST['submit'])){
  $id= filter_var($_POST['id'] , FILTER_SANITIZE_NUMBER_INT);
  $previous_picture_name= filter_var($_POST['previous_picture'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $title = filter_var($_POST['title'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $body = filter_var($_POST['body'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $featured= filter_var($_POST['featured'] , FILTER_SANITIZE_NUMBER_INT);
 $picture = $_FILES['picture'];
  
  $featured = $featured == 1 ?: 0;
  
 if(!$title){
   $_SESSION["edit-post"] = "Title field empty";
 }elseif(!$body){
   $_SESSION["edit-post"] = "Body field empty";
 }else{
    if($picture['name']){
      $previous_picture_directory = '../img/' . $previous_picture_name;
      if($previous_picture_directory){
       unlink($previous_picture_directory);
      }
      
  $change = time();
 $picture_name = $change . $picture['name'];
  $picture_tmp_name = $picture['tmp_name'];
$targeted_directory = '../img/' . $picture_name;
  $avatar_size = $picture["size"];
  
  $allowed_ext = ["jpg" , "png" , "jpeg" ];
 $file_ext = explode('.', $picture_name);
 $file_ext=strtolower(end($file_ext));
 
 if(in_array($file_ext, $allowed_ext)){
   if($picture_size < 10000000){
     move_uploaded_file($picture_tmp_name, $targeted_directory );
     
   }else{
     $_SESSION["edit-post"] = "File too large, Less than 10mb needed";
   }
 }else{
 $_SESSION["edit-post"] = "File must be jpeg,jpg and png";
   }
   
      
      
    }
 }
 
 
if(isset($_SESSION["edit-post"])){
  header('location: ' . './edit-post.php');
  die();
}else{
  if($featured == 1){
 $featured_query= "UPDATE posts SET featured=0";
      $featured_result = mysqli_query($connection , $featured_query);
  }
  
$picture_insert = $picture_name ?? $previous_picture_name;
 $query = "UPDATE posts SET title='$title' , body='$body',picture='$picture_insert', featured=$featured WHERE id=$id LIMIT 1";
$result = mysqli_query($connection, $query);
 
  
  }
  if(mysqli_errno($connection)){
$_SESSION['edit-post']="Failed to update post";
  }else{ 
    $_SESSION['edit-post-success']="Post updated successfully";
  
}
 
}
header('location: ' . './index.php');
die();