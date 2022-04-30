<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$del = mysqli_query($conn,"delete from tbl_companies where CompanyID = '$id'"); // delete query
//$del_deps = mysqli_query($conn,"DELETE FROM tbl_compdeps WHERE Company = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:company_list.php");
    exit;
}
else 
{
    echo "Error deleting record."; // display error message if not delete
}
//ob_end_flush();
?>