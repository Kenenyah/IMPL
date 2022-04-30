<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$url = $_GET['url']; 
$sql = ("select IsActive from tbl_compdeps where DepID = '$id'");
$results = mysqli_query($conn, $sql);

$stat = mysqli_fetch_array($results);

$status=($stat['IsActive']);

echo($status);

if($status != 0){
$isact = mysqli_query($conn,"UPDATE tbl_compdeps SET IsActive = 0 where DepID = '$id'"); 
//echo("ONE");
}

else{
    $isact = mysqli_query($conn,"UPDATE tbl_compdeps SET IsActive = 1 where DepID = '$id'");
   // echo("two"); 

}

//var_dump ($isact);

if($isact)
{
    
    mysqli_close($conn); // Close connection
    header("location: $url");
    exit;
}
else
{
    echo "Error updating record"; // display error message if not update
}
//ob_end_flush();
?>