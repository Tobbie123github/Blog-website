<?php
include 'config/database.php';


if(isset($_POST['submit'])){
 $firstname = filter_var($_POST['firstname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $lastname = filter_var($_POST['lastname'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $username = filter_var($_POST['username'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $password= filter_var($_POST['password'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 $avatar = $_FILES['avatar'];
 
 //when inputs not selected
 if(!$firstname){
   $_SESSION["signup"] = "Please enter your firstname";
 }elseif(!$lastname){
   $_SESSION["signup"] = "Please enter your lastname";
 }elseif(!$username){
$_SESSION["signup"] = "Please enter your username";
 }elseif(strlen($password) < 8){
   $_SESSION["signup"] = "Password should be 8+ character";
 }elseif(!$avatar["name"]){
      $_SESSION["signup"] = "Choose an avatar";
 }else{
   $hash_password = password_hash($password , PASSWORD_DEFAULT);
   
   // if username already exist
   $query = "SELECT * FROM users WHERE username='$username'";
   $result = mysqli_query($connection, $query);
   if(mysqli_num_rows($result) >0){
     $_SESSION["signup"] = "Username already exist";
   }else{
     // AVATARRRR
     $change = time();
 $avatar_name = $change . $avatar['name'];
  $avatar_tmp_name = $avatar['tmp_name'];
$targeted_directory = './img/' . $avatar_name;
  $avatar_size = $avatar["size"];
  
  $allowed_ext = ["jpg" , "png" , "jpeg" ];
 $file_ext = explode('.', $avatar_name);
 $file_ext=strtolower(end($file_ext));
 
 if(in_array($file_ext, $allowed_ext)){
   if($avatar_size > 1000000){
     $_SESSION["signup"] = "File too large, Less than 1mb needed";
   }else{
     move_uploaded_file($avatar_tmp_name, $targeted_directory );
   }
 }else{
 $_SESSION["signup"] = "Invalid File type";
   }
 
 
   }
 }
 
 
 
if(isset($_SESSION["signup"])){
$_SESSION["signup-values"] = $_POST;
  header('location: ' . 'signup.php');
  die();
}else{
  $insert_query="INSERT INTO users SET  firstname='$firstname', lastname='$lastname', username='$username', password='$hash_password', avatar='$avatar_name', admin= 0";
  $query_result = mysqli_query($connection, $insert_query);
  if($query_result){
    $_SESSION["signup-success"]="Registration successful";
    header('location: ' . 'signin.php');
    die();
  }else{
    echo 'Error: ' . mysqli_errno($connection);
  }
}
 
 
 
 
 
 
}else{
  header('location: ' . 'signup.php');
  die();
}
