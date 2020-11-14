<?php
 include "navbar.php";
 session_start();


 $username = $_POST['username'];
 $password = $_POST['password'];


 function cleanData($input){
    $input = htmlspecialchars($input);
    trim($input);
    return $input;
 }

 $is_valid_data=true;
// validate inputs 

// validate username 

$username= cleanData($username);
if(!preg_match('/^[a-z]{6,12}$/',$username))
{
   echo "please enter a valid username";
   $is_valid_data=false;
}

// validate password 
$password = cleanData($password);
if(!preg_match("/[a-z]{8}/", $password) ){
    echo "please enter password useing only 8 small chars"."<br>";
    $is_valid_data = false;
}

if($is_valid_data=true){
   $_SESSION['username'] = $username;
   $_SESSION['password'] = $password;
   header('location:home.php');
}

if(isset( $_SESSION['username'] )&&$_SESSION['password'] ){
   header('location:home.php');
}else{
   header('location:login.php');
}
?>