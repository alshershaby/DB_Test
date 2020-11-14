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
$query_string = "SELECT customers.customerNumber,customers.customerName,count(orders.orderNumber)
                FROM customers JOIN orders
                on customers.customerNumber = orders.customerNumber
                GROUP by customers.customerName ";

$dbResult = $con->query($query_string);
?>

<h3 class=" text-center text-light"> Customers Orders </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Customer Number</td>
<td>Customer Name</td>
<td>Orders Number</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>"."<td>".$row['customerNumber']."</td> " ."<td>". $row['customerName']."</td> "."<td>". $row['count(orders.orderNumber)']."</td>"."</tr>" ;
}

?>

</tbody>
</table>
