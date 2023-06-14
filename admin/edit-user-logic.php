<?php 
include '../config/database.php';

if(isset($_POST['submit'])){
  $id= filter_var($_POST['id'] , FILTER_SANITIZE_NUMBER_INT);
$firstname = filter_var($_POST['firstname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $lastname = filter_var($_POST['lastname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$admin = filter_var($_POST['user-role'] , FILTER_SANITIZE_NUMBER_INT);

if(!$firstname){
  $_SESSION['edit-user'] = "Firstname required";
}elseif(!$lastname){
  $_SESSION['edit-user'] = "Lastname required";
}else{
  $query = "UPDATE users SET firstname='$firstname' , lastname='$lastname', admin=$admin WHERE id=$id LIMIT 1";
$result = mysqli_query($connection, $query);
 
  if(mysqli_errno($connection)){
$_SESSION['edit-user']="Failed to update user";
  }else{
    $_SESSION['edit-user-success']="$firstname $lastname updated successfully";
  }
  
}
}
header('location: ' . './manage-user.php');
die();