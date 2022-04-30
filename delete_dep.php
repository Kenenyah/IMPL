<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$url = $_GET['url']; 
$del = mysqli_query($conn,"delete from tbl_compdeps where DepID = '$id'"); // delete query

if($del)
{
    
    mysqli_close($conn); // Close connection
    header("location: $url");
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
//ob_end_flush();
?>