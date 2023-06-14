<?php
require 'config/database.php';

if(isset($_POST['submit'])){
  $username = filter_var($_POST['username'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $password= filter_var($_POST['password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
 if(!$username){
   $_SESSION['signin'] = 'Username required';
 }elseif(!$password){
     $_SESSION['signin'] = 'Password required';
 }else{
   $query= "SELECT * FROM users WHERE username='$username'";
   $result = mysqli_query($connection, $query);
   
   // for only one user
   if(mysqli_num_rows($result) == 1){
    $record = mysqli_fetch_assoc($result);
    $db_password = $record["password"];
     
    
    if(password_verify($password, $db_password)){
   $_SESSION['user-id'] = $record['id'];
      
      if($record['admin']==1){
        $_SESSION['user-admin'] = true;
      }
      
      $_SESSION['signin-success']='Log in Sucessfull';
      header('location: ' . './admin/');
    }else{
      $_SESSION['signin']="Wrong Password";
    }
   
     
   }else{
     $_SESSION['signin']="User not found";
   }
 }
 
 
 
 if(isset($_SESSION["signin"])){
$_SESSION["signin-values"] = $_POST;
  header('location: ' . './signin.php');
  die();
  
}
}else{
  header('location: ' . './signin.php');
  die();
}
