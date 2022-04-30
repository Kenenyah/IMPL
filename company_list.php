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
<?php ob_start()?>
  <p class="h2 mx-auto text-center mb-5"> Company List </p>

  <div class="container mb-3">

  <form class="form-inline d-flex">

    <div class="col-md-4 mr-auto">
    <a href="create_company.php">
      <button type="button" class="btn btn-md btn-outline-success">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
    </svg> Add Company
          </button></a>
        
    </div>
    

    <div class="col-4"></div>
    
    <div class="ml-auto col-md-3 col-lg-2">
    <a href="inactive_comp_list.php">
      <button type="button" class="btn btn-md btn-outline-dark"> Show Inactives
</button></a>
  </form>
</div>
</div>
  <div class="container table-responsive">

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th class = "text-left" scope="col">Name</th>
        <th class = "text-center" scope="col">Number</th>
        <th class = "text-center" scope="col">Letter</th>
        <th class = "text-center" scope="col">Departments</th>
        <th class = "text-center" scope="col">Edit</th>
        <th class = "text-center" scope="col">Inactivate</th>
        <th class = "text-center" scope="col">Delete</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
      //ob_start();

        // $query = "SELECT CompanyName, CompOwnerFN, CompOwnerLN, CompPhone, DepartmentName, stFirstName, stLastName, semester
        // FROM tbl_companies
        //     INNER JOIN tbl_students ON tbl_companies.CompanyID = tbl_Students.stCompany
        //         INNER JOIN tbl_compdeps
        //           ON tbl_students.stCompany = tbl_compdeps.Company
        //             AND tbl_students.stDepartment = tbl_compdeps.DepID
        //             AND tbl_companies.CompanyID = tbl_compdeps.Company
        //         INNER JOIN semesters ON tbl_students.stSemester = semesters.SemesterID     
        //  ORDER BY CompanyName";

        
        $sql = ('SELECT * from tbl_companies  WHERE IsActive != 0');
        
        $results = mysqli_query($conn, $sql);

        while($companies = mysqli_fetch_array($results)){
       // $companies = mysqli_fetch_all($results, MYSQLI_ASSOC);
          $id = $companies['CompanyID'];
          $name = $companies['CompanyName'];?>
         
          
        <td class = "text-left"><?=$companies['CompanyName'];?></td>
        <td class = "text-center"><?=$companies['CompPhone'];?></td>
        <td class = "text-center"> 
                <form action="letterForm2.php" method="get"><input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                </svg>
              </button></form></td>
        <td class = "text-center"><form action="departments.php" method="get"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="hidden" name="name" value="<?php echo $name; ?>"><button type="submit"  class="btn btn-sm btn-outline-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"></path>
        </svg>
              </button></form></td>
        <td class = "text-center"><form action="edit_company.php" method="get"><input type="hidden" name="id" value="<?php echo $id; ?>"><button type="submit" class="btn btn-sm btn-outline-primary">
              <svg xmlns="" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                <path
                  d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
              </svg> <span class="visually-hidden"></span></button></form></td>

              <td class = "text-center"><form action="isactive.php" method="get" onclick="return confirm('are you sure?')"><input type="hidden" name="id" value="<?php echo $id; ?>"><button type="submit" class="btn btn-sm btn-outline-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"></path>
              </svg>
              </button></td></form>



              <td class = "text-center"><form action="delete_comp.php" method="get" onclick="return confirm('are you sure?')"><input type="hidden" name="id" value="<?php echo $id; ?>"><button type="submit" name="delete" class="btn btn-sm btn-outline-danger">
                <svg xmlns="" width="15" height="15" fill="currentColor" class="bi bi-trash" viewBox="0 0 15 15">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
            </svg>
              </button></td>
        </tr>
        </form>
      <?php }?>

    </tbody>
  </table>

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