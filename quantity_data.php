<?php
include "navbar.php";

session_start();
if(!isset( $_SESSION['username'])){
header('location:login.php');
}

  $stock = $_POST['stock'];
  $serverName = 'localhost';
  $dbUser ='root';
  $dbPassword = '';
  $dbName = 'sunday_company';

  $con = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
  
  if($con->connect_error){
      die($con->connect_errno);
}

//   display query
$query_string ="SELECT  productName,quantityInStock
                FROM products
                WHERE quantityInStock > $stock ";

$dbResult = $con->query($query_string);
?>
<h3 class=" text-center text-light"> Stock </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>name</td>
<td>Quantity In Stock</td>
</tr>
</thead>

<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>".
"<td>".$row['productName']."</td>".
"<td>".$row['quantityInStock']."</td>".
"</tr>";
}
?>
</tbody>
</table>
