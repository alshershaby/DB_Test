<?php
 include "navbar.php";
?>

<div class="container d-flex align-items-center">
    <form class= "w-75 m-auto my-5" action="handle_login.php" method="post">
    <div class="form-group">
        <input name ="username" type="text" placeholder="User Name : 6:12 a-z" class="form-control ">
    </div>    
    <div class="form-group">
            
        <input name ="password" type="text" placeholder="Password : 5:14 char" class="form-control">
       
        <button class="btn btn-info my-2">login</button>
    </div>
    </form>
</div>