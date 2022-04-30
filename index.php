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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <body>
  <?php require 'navbar.php'?>
      <div class="container">
    <p class="h2 mx-auto text-center"> Lorem Ipsum </p>
    <p class="lead  mx-auto text-center">
      Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
    </p>
  </div>

<div class="container">
    <div class="row">
      <div class="col-sm-5 mx-auto text-center">
        <div class="shadow-lg mb-5 bg-white rounded card">
       <blockquote class="blockquote mb-0 card-body">
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
         <footer class="blockquote-footer">
           <small class="text-muted">
             Someone famous in <cite title="Source Title">Source Title</cite>
           </small>
         </footer>
       </blockquote>
     </div>
      </div>

      <div class="col-sm-5 mx-auto text-center">
        <div class="shadow-lg mb-5 bg-white rounded card">
       <blockquote class="blockquote mb-0 card-body">
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
         <footer class="blockquote-footer">
           <small class="text-muted">
             Someone famous in <cite title="Source Title">Source Title</cite>
           </small>
         </footer>
       </blockquote>
     </div>
      </div>


      <div class="col-sm-5 mx-auto text-center">
        <div class="shadow-lg mb-5 bg-white rounded card">
       <blockquote class="blockquote mb-0 card-body">
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
         <footer class="blockquote-footer">
           <small class="text-muted">
             Someone famous in <cite title="Source Title">Source Title</cite>
           </small>
         </footer>
       </blockquote>
     </div>
      </div>
    </div>
  </div>

<div class="container">

<p class="h2 mx-auto text-center"> Heading </p>
<p class="lead  mx-auto text-center">
  Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
</p>

</div>

<br>
<br>

    <footer class="bg-light text-center rounded text-lg-start mb-4">
   <!-- Copyright -->
    <div class="text-center p-3 list-group-item-secondary">
    <div class="container-fluid rounded">
    <ul class="p-2 mx-auto list-group list-group-horizontal-sm list-group-item-secondary">
    
  <li class=" col-4 list-group-item list-group-item-secondary"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
      </svg></span> Kenenyah Blancovitch Pagán</li>

  <li class=" col-4 list-group-item list-group-item-secondary"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/></svg></span> Kblancovitch@gmail.com</li>

  <li class=" col-4 list-group-item list-group-item-secondary"><span> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
      <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
      <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
      </span> 787-538-0287</li>
</ul>
</div>
    Copyright @2021 | Designed by 
      <a class = "text-white" href="#">Kenenyah</a>
  </div>
</footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php } ?>
  </body>
</html>
