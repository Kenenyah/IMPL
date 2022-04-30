<?php 
session_start();
require 'db_conn.php'; 

if(isset($_SESSION['Pass'])){

?> 


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<?php require 'navbar.php'?>
<?php ob_start();?>
  <p class="h2 mx-auto text-center"> Semester Creation </p>
  
  <div class="container mt-5">
    <form method="post">
      <p class="h5 ml-3 mb-4 text-muted text-center"> Semester Information: </p>

      <div class="row">
      <div class="offset-2 col-md-4">
          <select name='Semester1' class="form-control form-control-md text-center">
            <option selected value="Aug - Dec ">Aug - Dec</option>
            <option value="Jan - May ">Jan - May</option>
            <option value="June ">June</option>
            <option value="July ">July</option>
          </select>
        </div>
      
        <div class="col-md-4">
          <input type="number" name='Semester2' class="form-control text-center" min="2000" placeholder="2022" required>
        </div>
        </div>
     

        
      <?php
        if(isset($_POST['create'])) // when click on Update button
        {
            $SemesterID  = $_POST['SemesterID'];
            $Semester1 = $_POST['Semester1'].$_POST['Semester2'];
            
            $create = mysqli_query($conn,"INSERT INTO `semesters`(`SemesterID`, `Semester`) VALUES ('$SemesterID','$Semester1')");
          
            if($create)
            {
                mysqli_close($conn); // Close connection
                header('Location: semesters.php'); 
                ob_end_flush();
                exit;
                
            }
            else
            {
                echo mysqli_error($conn);
            }    	
        }
        ob_end_flush();
        ?>

<div class="row mx-auto mb-3 ">
      <div class="col-1 ml-5 mr-auto mt-3">

      <a href="semesters.php"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
      </div>

        <div class="col-3 ml-auto mt-3">
          <button type="submit" name=create class="btn btn-md btn-outline-success btn-md mt-3">Save</button>
        </div>
      </div>
</div>
    </form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
    <?php } ?>
</body>

</html>