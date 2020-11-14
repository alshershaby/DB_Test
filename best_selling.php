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
$query_string = "SELECT orderdetails.productCode,products.productName,COUNT(orderdetails.quantityOrdered),SUM(orderdetails.quantityOrdered*orderdetails.priceEach)
                FROM orderdetails JOIN products
                ON orderdetails.productCode = products.productCode
                GROUP by productCode
                ORDER BY COUNT(orderdetails.quantityOrdered) DESC";

$dbResult = $con->query($query_string);
?>

<h3 class=" text-center text-light"> Best Selling </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Product Code</td>
<td>Product Name</td>
<td>Sold</td>
<td>Profit</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>"."<td>".$row['productCode']."</td> " ."<td>". $row['productName']."</td> "."<td>". $row['COUNT(orderdetails.quantityOrdered)']."</td>"."<td>".$row['SUM(orderdetails.quantityOrdered*orderdetails.priceEach)']."</td>"."</tr>" ;
}

?>

</tbody>
</table>
