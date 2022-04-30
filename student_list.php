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
  <p class="h2 mx-auto text-center mb-5"> Student List </p>


  <div class="container table-responsive">

    <div class="container mb-3">


      <div class="row">

      <div class="col-md-4 mr-auto">
      <a href="create_student.php"><button type="button" class="btn btn-md btn-outline-success">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
        </svg>
              Add Student</button></a>
        </div>
        


        <div class="col-4"></div>

        <div class="col-md-4 col-lg-3">
          <ul class="navbar-nav">
            <li class="nav-item">
            <select class="custom-select custom-select-md mt-1 text-center" id=SemesterID onChange='reload()' name="Semester">
                  <option disabled value="">Semester</option>

       <?php
        $sql = ('SELECT * from semesters');
         
        $results = $conn->query($sql);

        
        $currentSem = ('SELECT Semester from setup');
        $res = mysqli_query($conn, $currentSem);
        $sems = mysqli_fetch_array($res);

        //var_dump($sems);

        $cursem = $sems['Semester'];

        
        $SemesterID=$_GET['SemesterID'];
        if($SemesterID!=null){
          //echo("treueee");
          $SemesterID=$_GET['SemesterID'];
        }
        else{
          //echo("falseeeee");
          $SemesterID = $cursem;
        }
        

        ?>
        
        <?php 
                
                  while($row = mysqli_fetch_assoc($results)):?>
                    
                      <option value=<?=$row['SemesterID']?><?=$row['SemesterID'] == $SemesterID ? ' selected="selected"' : '';?>><?=$row['Semester']?></option>

                    <?php endwhile; ?>

                    <script>
                  function reload(){
                    let v1=document.getElementById('SemesterID').value;
                    
                   // document.write(v1);
                    self.location='student_list.php?SemesterID='+v1;
                    
                  }
                </script>

              </select>
            </li>
          </ul>
        </div>

         
        </div>
  
  </div> 
  <table class="table table-striped table-md">
    <thead>
      <tr>
        <th class = "text-left" scope="col">Name</th>
        <th class = "text-center" scope="col">Student Number</th>
        <th class = "text-center" scope="col">Phone</th>
        <th class = "text-center" scope="col">Company</th>
        <th class = "text-center" scope="col">Letter</th>
        <th class = "text-center" scope="col">Edit</th>
        <th class = "text-center" scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        
        <?php
        // $query = "SELECT CompanyName, CompOwnerFN, CompOwnerLN, CompPhone, DepartmentName, stFirstName, stLastName, semester
        // FROM tbl_companies
        //     INNER JOIN tbl_students ON tbl_companies.CompanyID = tbl_Students.stCompany
        //         INNER JOIN tbl_compdeps
        //           ON tbl_students.stCompany = tbl_compdeps.Company
        //             AND tbl_students.stDepartment = tbl_compdeps.DepID
        //             AND tbl_companies.CompanyID = tbl_compdeps.Company
        //         INNER JOIN semesters ON tbl_students.stSemester = semesters.SemesterID     
        //  ORDER BY CompanyName";


        
        

      $sql = ("SELECT * from tbl_students where stSemester = '$SemesterID'");
      $results = mysqli_query($conn, $sql);

         while($student = mysqli_fetch_array($results)){
          $id = $student['StudentID'];
          $cID = $student['stCompany'];

          $cN = ("SELECT CompanyName
              FROM tbl_companies
              where CompanyID='$cID'");

          $cnRes = mysqli_query($conn, $cN);
          $comp = mysqli_fetch_array($cnRes);

          ?>
          

          <td class = "text-left"><?=$name = $student['stLastName'].', '.$student['stFirstName'];?></td>
          <td class = "text-center"><?=$student['StudentNumber'];?></td>
          <td class = "text-center"><?=$student['stPhone'];?></td>
          <td class = "text-center"><?=$comp['CompanyName'];?></td>

          <td class = "text-center"> 
                <form action="letterForm.php" method="get"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="hidden" name="cID" value="<?php echo $cID; ?>">
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                </svg>
              </button></form></td>

          <td class = "text-center"> 
                <form action="edit_student.php" method="get"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="hidden" name="cID" value="<?php echo $cID; ?>">
          <button type="submit" class="btn btn-sm btn-outline-primary">
              <svg xmlns="" width="15" height="15" fill="currentColor"
                class="bi bi-person-badge" viewBox="0 0 15 15">
                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                <path
                  d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z">
                </path>
              </svg></button></form></td>

              

              <td class = "text-center"><form action="delete_student.php" method="get" onclick="return confirm('are you sure?')"><input type="hidden" name="id" value="<?php echo $id; ?>"><button type="submit" class="btn btn-sm btn-outline-danger">
                <svg xmlns="" width="15" height="15" fill="currentColor" class="bi bi-trash" viewBox="0 0 15 15">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg>
              </button></td>
      </tr>
         </form>
      <?php } ?>
    </tbody>  
  </div>
</div>



  </main>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <?php } ?>
</body>
</html>