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

  <p class="h2 mx-auto text-center"> Program Setup </p>
  <div class="container mt-5">

  <?php 
  ob_start();
  $sql = ('SELECT * from setup');

  $results = mysqli_query($conn, $sql);
  
  
  if($results === false){
  
    echo mysqli_error($conn);
  
  } else{
    
    $setup = mysqli_fetch_assoc($results);
  
     //var_dump($setup);
  
  }
  
  ?>

<form method="post">
        
    <p class="h5 mx-auto mt-3 mb-2 text-muted"> University: 
         </p>
      <div class="row mt-2">
          <div class="container">
            <div class="input-group input-group-md">
              <input type="text" name="NameUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Interamerican University"value="<?php echo $setup["NameUni"]?>" required>
            </div>
            <div class="mt-2 input-group input-group-md">
              <input type="text"  name="DeptUni" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-md" placeholder="Department of Science and Technology"
                value="<?php echo $setup["DeptUni"]?>">
            </div>
          </div>

          <div class="row mt-2">
            <div class="container">
              <div class="col input-group input-group-md">
                <input type="text"  name="PhoneUni" class="form-control" placeholder="(123) 456-7890" value="<?php echo $setup["PhoneUni"]?>" required>
              </div>
            </div>
          </div>
        </div>
        <p class="h5 mx-auto mt-3 mb-2 text-muted"> Physical Address: </p>
      <div class="row mt-2">
        <div class="container">
          <div class="input-group input-group-md">
            <input type="text"  name="AdressUni" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Bright Road Ave. #73" value="<?php echo $setup["AdressUni"]?>">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text"  name="CityUni" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006" value="<?php echo $setup["CityUni"]?>">
          </div>
        </div>
      </div>


      <p class="h5 mx-auto mt-5 mb-2 text-muted"> Professor in charge: </p>
      <div class="row">
      <div class="col-4 mt-2 ">
          <input type="text"  name="TitleProf" class="form-control" placeholder="Catedratico"
          value="<?php echo $setup["TitleProf"]?>">
        </div>
        <div class="col-4 mt-2">
          <input type="text" name="FNProf" class="form-control" placeholder="John"
          value="<?php echo $setup["FNProf"]?>" required>
        </div>
        <div class="col-4 mt-2">
          <input type="text" name="LNProf" class="form-control" placeholder="Doe"
          value="<?php echo $setup["LNProf"]?>">
        </div>
      </div>


      <div class="row mt-5">
          <div class="col-4">
            <p class="h5 mx-auto mb-2 text-muted">Current Semester: </p>
            <select class="form-control form-control-md mt-1 text-center" name="Semester" required>
              <option selected>Semester</option>
              
        <?php
          $sql = ('SELECT * from semesters');
          $query = ('SELECT Semester from Setup');

          $qry = mysqli_query($conn, $query);
          $semest = mysqli_fetch_assoc($qry);

          $CurSem = $semest["Semester"];

            $sems =("SELECT Semester from semesters where SemesterID ='$CurSem'");

          $results = mysqli_query($conn, $sql);
          $q = mysqli_query($conn, $sems);
          

          if($results === false){
 
            echo mysqli_error($conn);

          } else{
            
            $semesters = mysqli_fetch_all($results, MYSQLI_ASSOC);
            
            $semest = mysqli_fetch_assoc($q);
            //var_dump($semest);
          }
          ?>
          <?php foreach ($semesters as $semester): ?>
            <option value="<?php echo $semester['SemesterID']?>" <?php if ($semester['Semester']==$semest["Semester"]){echo 'selected="selected"';}?>><?=$semester['Semester'];?>
        </option>
            <?php endforeach; ?>
            </select>
          </div>

          <div class="col">
          <p class="h5 mx-auto mb-2 text-muted">Course Code: </p>

          <div class="form-group form-control-md">
               <input type="text" name="CourseCode" class="form-control" placeholder="COMP 4910" value="<?php echo $setup["CourseCode"]?>">
          </div>

          </div>
          <div class="col">
          <p class="h5 mx-auto mb-2 text-muted">Course Name: </p>

          <div class="form-group form-control-md">
               <input type="text" name="CourseName" class="form-control" placeholder="Practica y Etica Profesional" value="<?php echo $setup["CourseName"]?>">
          </div>

          </div>
                    
          </div>

          <div class="row mt-2">
            <!-- Add picture -->
            <div class="col-4">
                  <p class="h5 mx-auto mb-2 text-muted">Page Logo: </p>
                    <div class="form-group form-control-md">
                      <input type="file" class="form-control-file" id="insertFile">
                    </div>

              </div>
          </div>

      

        <!-- Add url -->
        <div class="row mt-3">
            <div class="col">
            <p class="h5 mx-auto mb-2 text-muted">Image URL: </p>
              <div class="form-group form-control-md">
                <input type="text" name="URL" class="form-control" placeholder="http://www.sg.inter.edu/" value="<?php echo $setup["URL"]?>">
              </div>

          </div>
          </div>
          
        <!-- Add PW -->
        <div class="row mt-3">
            <div class="col">
            <p class="h5 mx-auto mb-2 text-muted">Login Password: </p>
              <div class="form-group form-control-md">
          <input type="Password" name="Pass" class="form-control" placeholder="Password01923" value="<?php echo $setup['Pass']?>">
              </div>

          </div>
        </div>

        <?php
        
        if(isset($_POST['update'])) // when click on Update button
        {
            $NameUni = $_POST['NameUni'];
            $DeptUni = $_POST['DeptUni'];
            $PhoneUni = $_POST['PhoneUni'];
            $AdressUni = $_POST['AdressUni'];
            $CityUni = $_POST['CityUni'];
            $TitleProf = $_POST['TitleProf'];
            $FNProf = $_POST['FNProf'];
            $LNProf = $_POST['LNProf'];
            $Semester = $_POST['Semester'];
            $URL = $_POST['URL'];

            $CourseCode = $_POST['CourseCode'];
            $CourseName = $_POST['CourseName'];
            $Pass = $_POST['Pass'];

            
          
            $edit = mysqli_query($conn,"update setup set NameUni='$NameUni',DeptUni='$DeptUni',PhoneUni='$PhoneUni',AdressUni='$AdressUni',CityUni='$CityUni',TitleProf='$TitleProf',FNProf='$FNProf',LNProf='$LNProf',Semester='$Semester',URL='$URL',CourseCode='$CourseCode',CourseName='$CourseName',Pass='$Pass'");
          
            if($edit)
            {
                mysqli_close($conn); // Close connection
                header('Location: setup.php'); 
                
            }
            else
            {
                echo mysqli_error();
            }    	
        }
        ob_end_flush();
        ?>
<div class="row mx-auto mb-5 ">
      <div class="col-1 ml-5 mr-auto mt-3">

      <a href="student_list.php"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
      </div>

        <div class="col-3 ml-auto mt-3">
          <button type="submit" name="update" class="btn btn-md btn-outline-success btn-md mt-4">Save</button>
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