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
$query_string = "SELECT customerNumber,customerName,city,creditLimit
                 FROM customers
                 WHERE creditLimit > 20000 
                 order by creditLimit asc";

$dbResult = $con->query($query_string);
?>

<h3 class=" text-center text-light"> Customers with credit limit more than 20000 </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Customer name</td>
<td>City</td>
<td>CreditLimit</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>"."<td>".$row['customerName']."</td> " ."<td>". $row['city']."</td> "."<td>". $row['creditLimit']."</td>"."</tr>" ;
}

?>

</tbody>
</table>
