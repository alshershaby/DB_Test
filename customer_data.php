<?php
include "navbar.php";


session_start();
if(!isset( $_SESSION['username'])){
header('location:login.php');
}

  $id = $_POST['id'];
  $serverName = 'localhost';
  $dbUser ='root';
  $dbPassword = '';
  $dbName = 'sunday_company';

function cleanData($input){
  $input = htmlspecialchars($input);
  trim($input);
  return $input;
}

$is_valid_data=true;

$id= cleanData($id);

if(!preg_match('/^[0-9]{3}$/',$id))
{
   echo "please enter a valid ID";
   $is_valid_data=false;
}

if($is_valid_data=true){
  $_SESSION['id'] = $id;
  
$con = new mysqli($serverName,$dbUser,$dbPassword,$dbName);
  
if($con->connect_error){
    die($con->connect_errno);
}

//   display query
$query_string = "SELECT customerNumber,customerName,city,creditLimit,phone,addressLine1
               FROM customers
               WHERE customerNumber = $id ";

$dbResult = $con->query($query_string);
?>
<h3 class=" text-center text-light"> Cusomer's Data </h3>

<table class="table text-light w-75 m-auto my-5">

<thead>
<tr>
<td>Customer name</td>
<td>City</td>
<td>phone</td>
<td>addressLine1</td>
<td>CreditLimit</td>
</tr>
</thead>
<tbody>
<?php

while($row = mysqli_fetch_assoc($dbResult))
{
echo "<tr>".
"<td>".$row['customerName'].
"</td> " ."<td>". $row['city']."</td> ".
"<td>". $row['phone']."</td>".
"<td>". $row['addressLine1']."</td>".
"<td>". $row['creditLimit']."</td>".
"</tr>" ;
}
?>
</tbody>
</table>


<?php
}
else{
 ?>
<h3 class=" text-center text-light">please enter valid ID </h3>

 <?php
}

?>