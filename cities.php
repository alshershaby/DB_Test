<?php
include "navbar.php";

session_start();
if(!isset( $_SESSION['username'])){
header('location:login.php');
}


$serverName = 'localhost';
$dbUser ='root';
$dbPassword = '';
$dbName = 'sunday_company';

$con = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
if($con->connect_error){
    die($con->connect_errno);
}

//   display query
$query_string = "SELECT city
                FROM customers";

$dbResult = $con->query($query_string);
?>

<form  action="cities_data.php" method="post">

<h3 class="no-margin text-center text-light"> Cities </h3>
<div class="container">
<div class="row align-items-center">
<div class="form-group m-auto w-100 d-flex justify-content-center">

<select name="city" class="form-control custom-select w-75 m-auto my-5">

<option value="Choose city">Choose city</option>

<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<option >".$row['city']."</option>" ;
}
?>
</select>
<button class="btn btn-info">Submit</button>
</div>
</div>
</div>
</form>