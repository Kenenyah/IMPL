<?php
// Include the database connection file
require('db_conn.php');

if (isset($_POST['compID']) && !empty($_POST['compID'])) {

	// Fetch state name base on company id
      $cid=$_POST['compID'];
	$query = "SELECT * FROM tbl_compdeps WHERE Company = '$cid' and IsActive != 0";
	$result = $conn->query($query);

	if ($result->num_rows > 0) {
		echo '<option selected disabled value="">Select Department</option>'; 
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['DepID'].'">'.$row['DepartmentName'].'</option>'; 
		}
	} else {
		echo '<option value="">Department not available</option>'; 
	}
}
?>