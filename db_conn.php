
<!--    db host =  localhost 
        db username = UserInternship 
        db name = internship 
        db pass = internship 
    -->

<?php 

$db_host = "localhost";
$db_name = "internship";
$db_user = "root";
$db_pass = "";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()){
  echo mysqli_connect_error();
  exit;

}

?>