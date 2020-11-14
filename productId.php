<?php
 include "navbar.php";
 session_start();
 if(!isset( $_SESSION['username'])){
 header('location:login.php');
 }
?>

<div class="container d-flex align-items-center">
    <form class= "w-75 m-auto my-5" action="productId_data.php" method="post">
 
    <div class="form-group">
    <input name ="productId" type="text" placeholder="Product ID" class="form-control is-valid">
    <button class="btn btn-info my-2">Find</button>
    </div>
 
    </form>
</div>