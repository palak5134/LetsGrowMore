<?php 

include 'classes/dbh.class.php';

error_reporting(0);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
    <title>Result</title>
  </head>
  <body>
  <nav class="navbar navbar-light" style="background:#303a52">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-white" href="#">
        
        Res<span style="color: #fc85ae">ult</span> 
      </a>
      <a href="admin/<?php
        if(!$_COOKIE['user']){
          echo 'admin-login.php';
        }
        else{
          echo'dashboard.php';
        }
      ?>"><button class="me-3  btn btn-secondary">Admin</button></a>
    </div>
  </nav>
  
  <?php
  $admin=new Admin();
  $status=$admin->getStatus();
  foreach($status as $rows){
  if($rows['status']==1){
  echo'<div class="row ">
      <div class="col-md-6 mt-5 pt-3">
      <img  src="images/student.jpg" alt="">

      </div>
      <div class="col-md-6 mt-5 ">
          
          <div style="padding-top:200px;padding-left:20px;" >
          <h2 style="color:#574b90">Search Result <i class="fas fa-search"></i></h2>
          <div class="mt-4">
              <form action="result.php" method="post">
                <label for="rollno">Enter Roll number</label>
                <input type="text" name="rollno" required >
                <label for="class">Class</label>
                <input type="text" name="class" required>
                <button class="btn" type="submit" name="searchStu"style="background:#fc85ae"><i class="fas fa-arrow-right"></i></i></button>
                </form>
        
        </div>
         </div>
         </div>
  </div>';
  }else if($rows['status']==0){
    echo'
    <div class="text-center mt-5">
      <p>Not Declared !!!!!!!!</p>
    </div>
    ';
  }
}

  ?>
  <footer class="fixed-bottom text-center text-white " style="background:black">
  <p class="mb-0"> © Result 2021 </p> 
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

   
  </body>
</html>