<?php
    include "navbar.php";

session_start();
if(!isset( $_SESSION['username'])){
header('location:Login.php');
}

?>


<header>
    <div class="overlay">
        <h2>Welcome to MySQL</h2>
    </div>
</header>
