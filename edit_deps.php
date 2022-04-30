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
<?php
ob_start();

  $id = $_GET["id"];
  $name = $_GET["name"];

  //var_dump($id);

$sql = ("SELECT * from tbl_compdeps where DepID ='$id'");


$results = mysqli_query($conn, $sql);

if($results === false){

  echo mysqli_error($conn);

} else{
  
$dep = mysqli_fetch_assoc($results);
   //var_dump($dep);
}
$comp = $dep["Company"];
$url = "departments.php?id=$comp&name=$name";
?>

  <p class="h2 mx-auto text-center"> Department Editing </p>

  <div class="container mt-5">
    <form method="post">               


    <div class="row">
      <div class="col">
      <p class="h5 mx-auto mt-3 mb-2 text-muted"> Name: </p>
      </div>
      <div class="col">
      <p class="h5 mx-auto mt-3 mb-2 text-muted"> Email: </p>
      </div>
      <div class="col">
      <p class="h5 mx-auto mt-3 mb-2 text-muted"> Department Phone: </p>
      </div>
    </div>
      <div class="row mt-2">
        <div class="col ">
          <input type="text" name="DepartmentName" class="form-control" placeholder="R&D"  value="<?php echo $dep["DepartmentName"]?>">
        </div>

        <div class="col ">
          <input type="email" name="depEmail" class="form-control" placeholder="R&D"  value="<?php echo $dep["depEmail"]?>">
        </div>           

        <div class="col  input-group input-group-md">
              <input type="text" name="depPhone" class="form-control" placeholder="(123) 456-7890"  value="<?php echo $dep["depPhone"]?>">
            </div>
        </div>

        <p class="h5 mx-auto mt-5 mb-2 text-muted"> Manager Name: </p>
      <div class="row">
      <div class="col-4 ">
          <input type="text" name="TituloEncargado" class="form-control" placeholder="Dr."  value="<?php echo $dep["TituloEncargado"]?>">
        </div>
        <div class="col-4 ">
          <input type="text" name="EncargadoFN" class="form-control" placeholder="John"  value="<?php echo $dep["EncargadoFN"]?>">
        </div>
        <div class="col-4 ">
          <input type="text" name="EncargadoLN" class="form-control" placeholder="Doe"  value="<?php echo $dep["EncargadoLN"]?>">
        </div>
      </div>  


      <p class="h5 mx-auto mt-5 mb-2 text-muted"> Manager Phone: </p>
      <div class="row">
      <div class="col-5 input-group input-group-md">
              <input type="text" name="EncargadoPhone" class="form-control" placeholder="(123) 456-7890"  value="<?php echo $dep["EncargadoPhone"]?>">
            </div>
        </div>

      <div class="row mt-5">
        <div class="col-10">
        <p class="h5 mb-2 text-muted"> Comments on Department: </p>
          <div class="form-floating">
             <textarea class="form-control" name="EncargadoComment" placeholder="Leave a comment here"  id="floatingTextarea2" style="height: 200px"><?php echo $dep["EncargadoComment"]?></textarea>
          </div>
        </div>
        <div class="col"></div>
      </div>

      <?php
        if(isset($_POST['update'])) // when click on Update button
        {

          $DepartmentName = $_POST['DepartmentName'];
          $EncargadoFN = $_POST['EncargadoFN'];
          $EncargadoLN = $_POST['EncargadoLN'];
         
          $EncargadoPhone = $_POST['EncargadoPhone'];
          $EncargadoComment = $_POST['EncargadoComment'];
          $depEmail = $_POST['depEmail'];
          
          $depPhone = $_POST['depPhone'];
          $TituloEncargado = $_POST['TituloEncargado'];

            
          
            $edit = mysqli_query($conn,"UPDATE `tbl_compdeps` SET `DepartmentName`='$DepartmentName',`EncargadoFN`='$EncargadoFN',`EncargadoLN`='$EncargadoLN',`EncargadoPhone`='$EncargadoPhone',`EncargadoComment`='$EncargadoComment',`depEmail`='$depEmail',`depPhone`='$depPhone',`TituloEncargado`='$TituloEncargado' WHERE DepID ='$id'");
          
            if($edit)
            {
                mysqli_close($conn); // Close connection
                $url = "departments.php?id=$comp&name=$name";
                header("Location: $url");
                
            }
            else
            {
                echo mysqli_error();
            }    	
        }
        ob_end_flush();
        ?>
<div class="row mb-3 ">
      <div class="col-1 mr-auto mt-3">

      <a href="<?php echo $url?>"><button type="button" name="back" class="btn btn-md btn-outline-danger btn-md mt-4">Cancel</button></a>
      </div>

        <div class="col-3 ml-auto mt-3">
          <button type="submit" name=update class="btn btn-md btn-outline-primary btn-md mt-4">Save</button>
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