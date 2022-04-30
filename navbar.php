<?php
          $sql = ('SELECT * from Setup');


          $results = mysqli_query($conn, $sql);
          

          if($results === false){

            echo mysqli_error($conn);

          } else{
            
            $url = mysqli_fetch_assoc($results);

           // var_dump($url);
          }
  ?>
          <div class="container-fluid mb-3 sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
      <a class="navbar-brand" href="<?php echo $url["URL"]?>" target="_blank"><img
          src="http://www.sg.inter.edu/wp-content/uploads/2018/05/Inter-San-German-LOGO.png" width="225" height="45"
          class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link ml-2" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="student_list.php">Student List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="company_list.php">Company List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="semesters.php">Semesters</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link ml-2" href="reports.php">Reports</a>
          </li> -->
          <li class="nav-item">
          <a class="nav-link ml-2" href="setup.php">Setup
        </a>
          </li>
          <li class="nav-item">
          <a class="nav-link ml-2" style="color:red" href="logout.php">Logout
        </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
