<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$del = mysqli_query($conn,"delete from tbl_students where StudentID = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:student_list.php");
    exit;
}
else 
{
    echo "Error deleting record."; // display error message if not delete
}
//ob_end_flush();
?>