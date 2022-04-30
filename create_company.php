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

  <p class="h2 mx-auto text-center"> Company Creation </p>

  <div class="container mt-5">
    <form method="post">             
          

    <div class="row">
      <div class="col"><p class="h5 mx-auto mt-3 mb-2 text-muted"> Name: </p></div>
      <div class="col"><p class="h5 mx-auto mt-3 mb-2 text-muted"> Email: </p></div>
      <div class="col"><p class="h5 mx-auto mt-3 mb-2 text-muted"> Phone Number: </p></div>
    

    </div>
    
      <div class="row mt-2">
        <div class="col ">
          <input type="text" class="form-control" name="CompanyName" placeholder="Google" required>
        </div>
        
        <div class="col ">
          <input type="email" name="CompEmail" class="form-control" placeholder="Email@gmail.com" >
        </div>

        <div class="col input-group input-group-md">
              <input type="text" name="CompPhone" class="form-control" placeholder="(123) 456-7890" >
        </div>
      </div> 

    <p class="h5 mx-auto mt-5 mb-2 text-muted"> Owner: </p>
      <div class="row">
        <div class="col mt-2">
          <input type="text" name="OwnerPosition" class="form-control" placeholder="CEO">
        </div>
        <div class="col mt-2">
          <input type="text" name="CompOwnerFN" class="form-control" placeholder="John" required>
        </div>
        <div class="col mt-2 ">
          <input type="text" class="form-control" name="CompOwnerLN" placeholder="Doe">
        </div>
      </div>    


      <div class="row mt-2">
        <div class="container">
        <p class="h5 mt-3 mb-2 text-muted"> Physical Address: </p>
          <div class="input-group input-group-md">
            <input type="text" name="CompAdress" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Bright Road Ave. #73">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text" name="CompCity" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006" >
          </div>
        </div>

        <div class="container">
          <p class="h5 mt-3 mb-2 text-muted"> Postal Address: </p>
          <div class="input-group input-group-md">
            <input type="text" name="CompPostAddress" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="PO BOX 523029">
          </div>
          <div class="mt-2 input-group input-group-md">
            <input type="text" name="CompPostCity" class="form-control" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-md" placeholder="Washington, DC 20006">
          </div>
        </div>

      </div>
        <div class="row">
            <div class="col mt-4">
              <p class="h5 mx-auto mb-2 text-muted">Company Documents: </p>
              <div class="form-group form-control-md">
                <input type="file" class="form-control-file" id="insertFile">
              </div>
            </div>
        </div>

      <div class="row mt-4">
        <div class="col-10">
        <p class="h5 mb-2 text-muted"> Comments on Company: </p>
          <div class="form-floating">
             <textarea class="form-control" name="CompComments" placeholder="Leave a comment here"  id="floatingTextarea2" style="height: 200px" ></textarea>
          </div>
        </div>
        <div class="col"></div>
      </div>

      <?php
        if(isset($_POST['create'])) // when click on Update button
        {
            $CompanyID  = $_POST['CompanyID'];
            $CompanyName  = $_POST['CompanyName'];
            $CompOwnerFN = $_POST['CompOwnerFN'];
            $CompOwnerLN = $_POST['CompOwnerLN'];
            $CompAdress = $_POST['CompAdress'];
           
            $CompCity = $_POST['CompCity'];
            $CompEmail = $_POST['CompEmail'];
            $CompPhone = $_POST['CompPhone'];
            
            $CompComments = $_POST['CompComments'];
            $CompPostAddress = $_POST['CompPostAddress'];
            $CompPostCity = $_POST['CompPostCity'];
            $OwnerPosition = $_POST['OwnerPosition'];

            
          
            $create = mysqli_query($conn,"INSERT INTO `tbl_companies`(`CompanyID`, `CompanyName`, `CompOwnerFN`, `CompOwnerLN`, `CompAdress`, `CompCity`, `CompEmail`, `CompPhone`, `CompComments`, `CompPostAddress`, `CompPostCity`, `OwnerPosition`) VALUES ('$CompanyID','$CompanyName','$CompOwnerFN','$CompOwnerLN','$CompAdress','$CompCity','$CompEmail','$CompPhone','$CompComments','$CompPostAddress','$CompPostCity', '$OwnerPosition')");
          
            if($create)
            {
                mysqli_close($conn); // Close connection
                header('Location: company_list.php'); 
                
            }
            else
            {
                echo mysqli_error($conn);
            }    	
        }
        ob_end_flush();
        ?>

<div class="row mb-3 ">
      <div class="col-1 mr-auto mt-3">

      <a href="company_list.php"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
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