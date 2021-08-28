<?php

include '../classes/dbh.class.php';
error_reporting(0);
if (!isset($_COOKIE["admin"])) {
  header("location: admin/admin-login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="../css/dashboard.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Result</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      setTimeout(function(){
        $('.alert').hide();
      },2000);
      
    ;
      
    
     


    });
  </script>
</head>

<body>
  <div class="row">
    <div class="col-2">
      <div class=" main  flex-column ps-5 text-white" style="width: 280px;">
        <h2 style="font-weight:100;" class="fw-bolder pt-5 ps-2"> Res<span class="fw-bolder"
            style="color:#fc85ae">ult</span> </h2>
        <ul class="pt-5">
        <a href="main-dashboard.php">
            <li>Dashboard</li>
            
          </a>
          <a href="dashboard.php">
            <li class="mt-5">Student</li>
            
          </a>
          <a href="student-add.php">
            <li  class="active mt-5">Add</li>
          </a>
          <a href="add_result.php">
            <li class=" mt-5">Result</li>
          </a>
        </ul>
        <div class="user mb-5 ps-3 " style="position:relative;bottom:-255px; right:10%;">
          <div class="d-flex">
            <div class="text-center px-auto text-capitalize" style="width:50px;height:50px;background-color:grey;border-radius: 50px;">
              <p class="mt-2" style="font-size:20px;"><?php echo  $_COOKIE['user'][0]; ?></p>
            </div>
            <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:white" class="mt-2 ms-2"><?php echo  $_COOKIE['user']; ?></a><br>
            
            </div>
        
          </div>
          <!--------------MODAL FOR LOGOUT--------------------------------->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-dark">
                Do you want to Logout?
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="../scripts/login.php" method="post">
                      <button type="submit" name="logout" type="button" class="btn btn-danger">Logout</button>
                 </form>
              </div>
            </div>
          </div>
        </div>
  
      
        


      </div>
    </div>

    <!--------------student detais---------------------------->

    <div class="col-10 " style="background: #F4F6F7;">
      <div id="student">
        <div class="container ">

          <h2 class="pt-3 mt-3 ps-1">Add a Student</h2>
          <?php
            $message=$_GET['message'];
            $error=$_GET['error'];
                if($message){
                  echo'
                  
                  <div class="alert alert-success text-center mx-auto mb-1" role="alert"style="width:30%" >
                    <i class="fas fa-check-circle"></i>'.$message.'
                  </div>
                ';  
                }

                 if($error){
                  echo'
                  
                  <div class="alert alert-danger text-center mx-auto mb-1" role="alert"style="width:30%" >
                  <i class="fas fa-exclamation-triangle"></i>'.$error.'
                  </div>
                ';  
                }?>
          <form action="../scripts/adding.php" method="post"> 
            <div class="card shadow p-5 mt-5 " id="info">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group first">
                    <label for="name" class="mb-2"><b>Name</b></label>
                    <input type="text" autocomplete="off" class="form-control" id="name" name="name" required>
                  </div>
                </div>
              </div>
              <div class="row mt-3 mb-2">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="RollNo"> <b>RollNo</b> </label>
                    <input type="text" autocomplete="off" class="form-control" id="RollNo" name="RollNo" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="class"> <b>Class</b></label>
                    <input type="text" autocomplete="off" class="form-control" id="class" name="class" required>
                  </div>
                </div>
              </div>

              <div class="row mt-3 mb-2">
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="age"> <b> Age</b></label>
                    <input type="text" autocomplete="off" class="form-control" id="age" name="age" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group first">
                    <label for="dob"> <b> Dob</b></label>
                    <input type="date" autocomplete="off" name="dob" class="form-control" id="dob" required>
                  </div>
                </div>
              </div>
              <div class="mt-5 float-end">
                <input style="height:30px; font-size:13px;padding:2px 10px;background-color:#574b90" id="next"
                  value="submit" name="studentinfo" type="submit" class="btn px-5 btn-primary">
              </div>


            </div>
           
                             
            </div>
          </form>




        </div>
      </div>


   
     
 <!---------------------------------------------------------------------------------modal for update student------------------------------------------------------------------>
 
  
    </div>    
             









          



              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
                crossorigin="anonymous"></script>
                <script src="~/Scripts/jquery_cookie.js" type="text/javascript"></script>
              <!-- Option 2: Separate Popper and Bootstrap JS -->

              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
                integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
                crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
                integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
                crossorigin="anonymous"></script>

</body>

</html>