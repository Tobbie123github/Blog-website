<?php
include '../config/database.php';

if(isset($_POST['submit'])){
  $author_id = $_SESSION['user-id'];
  $title = filter_var($_POST['title'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $body = filter_var($_POST['body'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $featured= filter_var($_POST['featured'] , FILTER_SANITIZE_NUMBER_INT);
 $picture = $_FILES['picture'];
  
  $featured = $featured == 1 ?: 0;
  
 if(!$title){
   $_SESSION["add-post"] = "Title field empty";
 }elseif(!$body){
   $_SESSION["add-post"] = "Body field empty";
 }elseif(!$picture["name"]){
   $_SESSION["add-post"] = "Image not selected";
 }else{
        // AVATARRRR
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
     $_SESSION["add-post"] = "File too large, Less than 10mb needed";
   }
 }else{
 $_SESSION["add-post"] = "File must be jpeg,jpg and png";
   }
   
   
 }
  
  
  
  if(isset($_SESSION["add-post"])){
$_SESSION["add-post-values"] = $_POST;
  header('location: ' . './add-post.php');
  die();
   // to have just one featured post
  }else{
    if($featured == 1){
      $featured_query= "UPDATE posts SET featured=0";
      $featured_result = mysqli_query($connection , $featured_query);
    }
    
   
    
  $query="INSERT INTO posts (title, body, picture, author_id, featured) VALUES('$title' , '$body' , '$picture_name' , $author_id , $featured)";
  
  $result = mysqli_query($connection, $query);
 
 
 
    if(!mysqli_errno($connection)){
$_SESSION['add-post-success']="Post added  successfully";

  }else{
 $_SESSION['add-post']="Unable to add post";
  }
  
  
  
}
}

header('location: ' . './index.php');
die();