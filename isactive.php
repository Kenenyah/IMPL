<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$sql = ("select IsActive from tbl_companies where CompanyID = '$id'");
$results = mysqli_query($conn, $sql);

$stat = mysqli_fetch_array($results);

$status=($stat['IsActive']);

echo($status);

if($status != 0){
$isact = mysqli_query($conn,"UPDATE tbl_companies SET IsActive = 0 where CompanyID = '$id'"); 
//echo("ONE");
}

else{
    $isact = mysqli_query($conn,"UPDATE tbl_companies SET IsActive = 1 where CompanyID = '$id'");
   // echo("two"); 

}

//var_dump ($isact);

if($isact)
{
    
    mysqli_close($conn); // Close connection
    header("location: company_list.php");
    exit;
}
else
{
    echo "Error updating record"; // display error message if not update
}
//ob_end_flush();
?>