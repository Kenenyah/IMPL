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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<?php require 'navbar.php'?>
<?php 
  //ob_start();
  $id = $_GET["id"];
  //$cID = $_GET["cID"];

  $sqli = ("SELECT * from tbl_companies where CompanyID = '$id'");

  $res = mysqli_query($conn, $sqli);
  
  
  if($res === false){
  
    echo mysqli_error($conn);
  
  } else{
    
    $comps = mysqli_fetch_assoc($res);
  
     //var_dump($comps);
  
  }
  $qr = ("SELECT * from setup");

  $set = mysqli_query($conn, $qr);
  
  
  if($set === false){
  
    echo mysqli_error($conn);
  
  } else{
    
    $uni = mysqli_fetch_assoc($set);
  
     $sem=$uni['Semester'];
  
  }
  $sql = ("SELECT Semester from semesters where SemesterID='$sem'");

  $results = mysqli_query($conn, $sql);
  
  
  if($results === false){
  
    echo mysqli_error($conn);
  
  } else{
    
    $sms = mysqli_fetch_assoc($results);
  
     //var_dump($sms);
  
  }

  ?>
    <p class="h2 mx-auto text-center"> Letter Data </p>
  <div class="container mt-5">
    <form action="pdf2.php" target="_blank" method="post">

        
        <p class="h5 mx-auto mt-3 mb-2 text-muted"> University: 
         </p>
      <div class="row mt-2">
          <div class="container">
            <div class="input-group input-group-md">
              <input type="text" name="NameUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Interamerican University"value="<?php echo $uni["NameUni"]?>" required>
            </div>
            <div class="mt-2 input-group input-group-md">
              <input type="text"  name="DeptUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Department of Science and Technology"
                value="<?php echo $uni["DeptUni"]?>">
            </div>
          </div>

          <div class="row mt-2">
            <div class="container">
              <div class="col input-group input-group-md">
                <input type="text"  name="PhoneUni" class="form-control" placeholder="(123) 456-7890" value="<?php echo $uni["PhoneUni"]?>" required>
              </div>
            </div>
          </div>
        </div>
        <p class="h5 mx-auto mt-3 mb-2 text-muted"> Physical Address: </p>
      <div class="row mt-2">
            <div class="container">
            <div class="input-group input-group-md">
                <input type="hidden"  name="AdressUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Bright Road Ave. #73" value="<?php echo $uni["AdressUni"]?>">
            </div>
            <div class="mt-2 input-group input-group-md">
                <input type="text"  name="CityUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006" value="<?php echo $uni["CityUni"]?>">
            </div>
            </div>
      </div>



      <div class="row mt-5 ">
      <div class="col"><p class="h5 mx-auto mt-3 mb-2 text-muted"> Company Name: </p></div>
    

    </div>
    
      <div class="row mt-2">
        <div class="col-6 ">
          <input type="text" class="form-control" name="CompanyName" placeholder="Google"  value="<?php echo $comps["CompanyName"]?>" required>
        </div>
        <div class="col-6 ">
          <input type="hidden" class="form-control" name="CompanyID" placeholder="Google"  value="<?php echo $comps["CompanyID"]?>" required>
        </div>
      </div>    


      <div class="row mt-2">
        <div class="container">
        <p class="h5 mt-3 mb-2 text-muted"> Physical Address: </p>
          <div class="input-group input-group-md">
            <input type="text" name="CompAdress" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Bright Road Ave. #73" value="<?php echo $comps["CompAdress"]?>">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text" name="CompCity" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006" value="<?php echo $comps["CompCity"]?>">
          </div>
        </div>
        </div>
        

        
      <div class="row mt-5">
          <div class="col-6">
            <p class="h5 mx-auto mb-2 text-muted">Current Semester: </p>
            <input type="text" name="Semester" class="form-control text-center" min="2000" value="<?= $sms['Semester'];?>" placeholder= "<?= $sms['Semester'];?>" readonly>
          </div>
            

          <div class="col-6">
          <p class="h5 mx-auto mb-2 text-muted">Course Code: </p>

          <div class="form-group form-control-md">
               <input type="text" name="CourseCode" class="form-control" placeholder="COMP 4910" value="<?php echo $uni["CourseCode"]?>">
          </div>

          </div>
          <div class="col-6">
          <p class="h5 mx-auto mb-2 text-muted">Course Name: </p>

          <div class="form-group form-control-md">
               <input type="text" name="CourseName" class="form-control" placeholder="Practica y Etica Profesional" value="<?php echo $uni["CourseName"]?>">
          </div>

          </div>
          <div class="col-6">
          <p class="h5 mx-auto text-muted">Program: </p>

          <div class="form-group form-control-md">
               <input type="text" name="Program" class="form-control" placeholder="Ciencias de Computadoras" value="">
          </div>
                    
          </div>
</div>



        <?php 
         //echo (phpversion());

          if(isset($_POST['letter'])) // when click on letter button
          {

            $NameUni = $_POST['NameUni'];
            $DeptUni = $_POST['DeptUni'];

            $AdressUni = $_POST['AdressUni'];
            $CityUni = $_POST['CityUni'];

            $CompanyName = $_POST['CompanyName'];
            $CompanyID = $_POST['CompanyID'];

            $CompAdress = $_POST['CompAdress'];
            $CompCity = $_POST['CompCity'];


            $Program = $_POST['Program'];

            $CourseName = $_POST['CourseName'];
            $CourseCode = $_POST['CourseCode'];
            $Semester = $_POST['Semester'];
            
            }

          ?>


        <div class="row mx-auto mb-3 ">
            <div class="col-2 mr-auto mt-3">

            <a href="company_list.php"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
            </div>
            <div class="col-2 ml-auto mt-3">

                <button type="submit" name="letter" class="btn btn-md btn-outline-success btn-md mt-4">Generate</button>
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