<?php

require 'db_conn.php'; // Using database connection file here

$id = $_GET['id']; 
$del = mysqli_query($conn,"delete from semesters where SemesterID = '$id'"); // delete query

if($del)
{
    
    mysqli_close($conn); // Close connection
    header("location: semesters.php");
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
//ob_end_flush();
?>