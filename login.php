<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>

  <body>
  <section class="vh-100" style="background-color: #E5FEFE;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-5-strong rounded">
       
        <div class="d-flex align-items-center mb-3 pb-1">

                    
                  
          <div class="container p-5 text-center">
          <span class="h1 fw-bold mb-0"><a class="navbar-brand" href="<?php echo $url["URL"]?>" target="_blank"><img
          src="http://www.sg.inter.edu/wp-content/uploads/2018/05/Inter-San-German-LOGO.png" width="245" height="55"
          class="d-inline-block align-top" alt="">
      </a></span>

      <form action='log.php' method='post'>
            <p class="h3 mb-5"></p>

            <?php if(isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error'];?></p>
                <?php } ?>

            <div class="form-outline mb-4">
              <input type="password" name="Pass" class="form-control form-control-lg" placeholder="Password" />
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
       </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>


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
  </body>
</html>