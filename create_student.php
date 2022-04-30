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
  ob_start();
  $sql = ('SELECT * from tbl_Students');

  $results = mysqli_query($conn, $sql);
  
  
  if($results === false){
  
    echo mysqli_error($conn);
  
  } else{
    
    $students = mysqli_fetch_assoc($results);
  
     //var_dump($students);
  
  }
  
  ?>
  <p class="h2 mx-auto text-center"> Student Creation </p>
  <div class="container mt-5">
    <form method="post">
      <p class="h5 mx-auto mt-3 mb-2 text-muted"> Name: </p>
      <div class="row">
        <div class="col mt-2">
          <input type="text" name="stFirstName" class="form-control" placeholder="John" required>
        </div>
        <div class="col mt-2">
          <input type="text" name="stLastName" class="form-control" placeholder="Doe">
        </div>

      </div>
      
      <div class="row mt-3">
      
      <div class="col-4"><p class="h5 mx-auto mt-3 mb-2 text-muted"> Student Number: </p></div>

      <div class="col-4"><p class="h5 mx-auto mt-3 mb-2 text-muted">Email: </p></div>

      <div class="col-4"><p class="h5 mx-auto mt-3 mb-2 text-muted">Phone Number: </p></div>
      </div>

    
      <div class="row mt-2">

      <div class="col-4 input-group input-group-md">
          <input type="text" name="StudentNumber" class="form-control" placeholder="E00-12-3456" required>
        </div>

        <div class="col ">
          <input type="email" name="stEmail" class="form-control" placeholder="Email@gmail.com">
        </div>

            <div class="col-4 input-group input-group-md">
              <input type="text" name="stPhone" class="form-control" placeholder="(123) 456-7890">
            </div>
          </div>

      <p class="h5 mx-auto mt-3 mb-2 text-muted"> Physical Address: </p>
      <div class="row mt-2">
        <div class="container">
          <div class="input-group input-group-md">
            <input type="text" name="stAddress" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Bright Road Ave. #73">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text" name="stCity" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006">
          </div>
        </div>

        <p class="h5 ml-3 mt-3 mb-2 text-muted"> Postal Address: </p>

        <div class="container">
          <div class="input-group input-group-md">
            <input type="text" name="stPostal" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="PO BOX 523029">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text" name="stPostalCity" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006">
          </div>
        </div>


      </div>

      <div class="row mt-5">
        <div class="col-4">

          <p class="h5 mx-auto mb-2 text-muted"> Gender: </p>
          <div class="custom-control custom-radio mt-2">
            <input type="radio" id="Gender1" value="0" name="Gender" class="custom-control-input" required>
            <label class="custom-control-label" for="Gender1">Male</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="Gender2" value="1" name="Gender" class="custom-control-input">
            <label class="custom-control-label" for="Gender2">Female</label>
          </div>
          <div class="custom-control custom-radio ">
            <input type="radio" id="Gender3" value="2" name="Gender" class="custom-control-input">
            <label class="custom-control-label" for="Gender3">Other</label>
          </div>
        </div>



        <div class="col-4">
                <p class="h5 mx-auto  mb-2 text-muted"> Internship Company: </p>

                <select class="form-control" name= "stCompany" id="comp" required>
                <option selected disabled value="">Select Company</option>
                <?php
                $query = "SELECT * FROM tbl_companies where IsActive !=0";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo '<option value="'.$row['CompanyID'].'">'.$row['CompanyName'].'</option>';
                }
                }else{
                echo '<option value="">Company not available</option>';
                }
                ?>
                </select>
          </div>
              

                
                        <div class="col-4">
                        <p class="h5 mx-auto  mb-2 text-muted"> Departments: </p>

                        <select class="form-control" name="stDepartment" id="deps" required>
                        <option selected disabled value="">Select Department</option>
                        </select>
                        </div>

        
        
 

                        <script type="text/javascript">
                          $(document).ready(function(){
                            // department dependent ajax
                            $("#comp").on("change",function(){
                              var compID = $(this).val();
                              $.ajax({
                                url :"action.php",
                                type:"POST",
                                cache:false,
                                data:{compID:compID},
                                success:function(data){
                                  $("#deps").html(data);
                                }
                              });
                            });
                          });
                        </script>
                        
      </div>

      <div class="row mt-5">
        <div class="col-4">
          <p class="h5 mx-auto mb-2 text-muted">Internship Semester: </p>
          <select class="form-control mt-1 text-center" name="stSemester" required="required">
            <option selected disabled value="">Semester</option>
           
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

        <div class="offset-2 col">
          <p class="h5 mx-auto mb-2 text-muted">Student Documents: </p>
            <div class="form-group form-control-md">
              <input type="file" class="form-control-file" id="insertFile">
            </div>
          </div>
        </div>

        <div class="row mt-4">
        <div class="col-10">
        <p class="h5 mb-2 text-muted"> Comments on Student: </p>
          <div class="form-floating">
             <textarea class="form-control" name="stComments" placeholder="Leave a comment here"  id="floatingTextarea2" style="height: 200px"></textarea>
          </div>
        </div>
        <div class="col"></div>
      </div>

        <?php
        if(isset($_POST['create'])) // when click on Update button
        {
           // $StudentID = $_POST['StudentID'];
            $StudentNumber = $_POST['StudentNumber'];
            $stFirstName = $_POST['stFirstName'];
            $stLastName = $_POST['stLastName'];
            $stEmail = $_POST['stEmail'];
            $stAddress = $_POST['stAddress'];
            $stCity = $_POST['stCity'];
            $stPhone = $_POST['stPhone'];
            $stDepartment = $_POST['stDepartment'];
            $stSemester = $_POST['stSemester'];
            $stCompany = $_POST['stCompany'];
            $Gender = $_POST['Gender'];
            $stPostal = $_POST['stPostal'];
            $stPostalCity = $_POST['stPostalCity'];
            $stComments = $_POST['stComments'];

            
          
            $create = mysqli_query($conn,"INSERT INTO `tbl_students` (`StudentID`, `StudentNumber`, `stFirstName`, `stLastName`, `stEmail`, `stAddress`, `stCity`, `stPhone`, `stDepartment`, `stSemester`, `stCompany`, `stComments`, `Gender`, `stPostal`, `stPostalCity`) VALUES ('', '$StudentNumber','$stFirstName', '$stLastName', '$stEmail', '$stAddress', '$stCity', '$stPhone','$stDepartment', '$stSemester', '$stCompany','$stComments',$Gender, '$stPostal', '$stPostalCity')");
          
            if($create)
            {
                mysqli_close($conn); // Close connection
                header('Location: student_list.php'); 
                
            }
            else
            {
                echo mysqli_error($conn);
            }    	
        }
        ob_end_flush();
        ?>

      <div class="row mb-4">
      <div class="col-1 mr-auto mt-3">

      <a href="student_list.php"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
      </div>

        <div class="col-3 ml-auto mt-3">

          <button type="submit" name="create" class="btn btn-md btn-outline-success btn-md mt-4">Save</button>
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