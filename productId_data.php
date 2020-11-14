<?php
include "navbar.php";

session_start();
if(!isset( $_SESSION['username'])){
header('location:login.php');
}

  $productId = $_POST['productId'];
  $serverName = 'localhost';
  $dbUser ='root';
  $dbPassword = '';
  $dbName = 'sunday_company';

  $con = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
  
  if($con->connect_error){
      die($con->connect_errno);
  }

//   display query
$query_string = "SELECT orderdetails.productCode,count(orders.orderNumber),orders.orderNumber,customers.customerName,customers.creditLimit
                 FROM orderdetails
                 INNER JOIN orders 
                 ON orderdetails.orderNumber = orders.orderNumber
                 INNER JOIN customers
                 ON customers.customerNumber = orders.customerNumber
                 GROUP BY customers.customerNumber
                 HAVING orderdetails.productCode = '$productId'
                 ORDER BY customers.creditLimit DESC";

$dbResult = $con->query($query_string);

?>
<h3 class=" text-center text-light"> Cusomer's Data </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Product Code</td>
<td>Num Of Orders</td>
<td>Order Number</td>
<td>Customer Name</td>
<td>Customer Credit</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>".
"<td>".$row['productCode']."</td> " .
"<td>". $row['count(orders.orderNumber)']."</td> ".
"<td>". $row['orderNumber']."</td>".
"<td>". $row['customerName']."</td>".
"<td>". $row['creditLimit']."</td>".
"</tr>" ;
}
?>
</tbody>
</table>
