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

$query_string = "SELECT manager.firstName as manfirst,employee.firstName as empfirst
FROM employees AS employee JOIN employees AS manager
ON employee.reportsTo = manager.employeeNumber";

$dbResult = $con->query($query_string);
?>

<h3 class=" text-center text-light"> Customers Orders </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Manager</td>
<td>employee</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>"."<td>".$row['manfirst']."</td> " ."<td>". $row['empfirst']."</td> "."</tr>";
}

?>

</tbody>
</table>
