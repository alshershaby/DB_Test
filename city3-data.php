<?php
include "navbar.php";

session_start();
if(!isset( $_SESSION['username'])){
header('location:login.php');
}

  $city = $_POST['city'];
  $serverName = 'localhost';
  $dbUser ='root';
  $dbPassword = '';
  $dbName = 'sunday_company';

  $con = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
  
  if($con->connect_error){
      die($con->connect_errno);
  }

//   display query
$query_string ="SELECT customerName,city,creditLimit
                FROM customers
                WHERE city = '$city'
                ORDER BY creditLimit DESC
                LIMIT 3";

$dbResult = $con->query($query_string);
?>
<h3 class=" text-center text-light"> 3 most richest </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Name</td>
<td>City</td>
<td>Money</td>
</tr>
</thead>

<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>".
"<td>".$row['customerName']."</td>".
"<td>".$row['city']."</td>".
"<td>".$row['creditLimit']."</td>".
"</tr>";
}
?>
</tbody>
</table>
