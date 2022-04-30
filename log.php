<?php
session_start();
include 'db_conn.php';

// if(isset($_POST['Pass'])){

//     function validate($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
// }


$Pass = $_POST['Pass'];

if(empty($Pass)){
    header("location:login.php?error=Password is required");
    exit();
}

$sql = "SELECT Pass FROM setup";

$result = mysqli_query($conn,$sql);

var_dump($result);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);

    if($row['Pass']===$Pass){
        echo "Logged In";
        $_SESSION['Pass'] = $row['Pass'];
        header('location: student_list.php');
        exit();
    }
    else{
        header("location:login.php?error=Incorrect Password");
        exit();
    }
} else{
    header("location:login.php");
    exit();
}

?>