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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Hello, world!</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
  <div class="row">
    <div class="col-2">
      <div class=" main  flex-column ps-5 text-white" style="width: 280px;">
        <h2 style="font-weight:100;" class="fw-bolder pt-5 ps-2"> Res<span class="fw-bolder" style="color:#fc85ae">ult</span> </h2>
        <ul class="pt-5">
        <a href="main-dashboard.php">
            <li>Dashboard</li>
            
          </a>
          <a href="dashboard.php">
            <li class=" mt-5">Student</li>
          </a>
          <a href="student-add.php">
            <li class=" mt-5">Add</li>
          </a>
          <a href="add_result.php">
            <li class="active mt-5">Result</li>
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


          <h2 class="pt-3 mt-3 ps-1">Manage Result</h2>
          <?php
          $message = $_GET['message'];
          if ($message) {
            echo '
                
                <div class="alert alert-success text-center mx-auto fixed-bottom" role="alert"style="width:30%" >
                  <i class="fas fa-check-circle"></i>' . $message . '
                </div>
              ';
          }

          ?>
          <div class="card mt-4 text-center mx-auto shadow" id="marks" style=" width:50rem;">
            <div class="d-flex mt-3 mx-auto">
              <form action="../scripts/adding.php" method="post">
              
                <label class="pe-3" for="class"><b>Class</b></label>
                
                <input class="ms-3" type="text" name="class" value="<?php echo $_GET['classes']; ?>" id="classes" onchange="myFunction()">
                <label class="ms-3" for="student"><b>Name</b></label>
                <script type="text/javascript">
                  function myFunction() {
                    var classes = document.getElementById("classes").value;

                    
                    window.location.href = 'add_result.php?classes=' + classes;


                  }
                </script>
                <select class="ms-3 p-2" name="rollno" id="">
                  <?php


                  $class = $_GET['classes'];

                  $students = new Student();
                  $student_name = $students->getAllStudent($class);

                  foreach ($student_name as $rows) {
                    if ($rows['maths'] == 0 && $rows['physics'] == 0 && $rows['chemistry'] == 0 && $rows['computer'] == 0 && $rows['engine'] == 0) {
                      echo '
               
                 <option value="' . $rows['RollNo'] . '">' . $rows['name'] . '</option>';
                    }
                  }
                  ?>
                </select>








            </div>
            <!-- <form action="../scripts/adding.php" method="post">  -->



          <div class="m-3" style=" background:#574b9030">
            <div class="row mt-3 mb-2 pt-3">
              <div class="col-md-6 ps-5">
                <p class="pe-5 "> <b>Maths</b> </p>
              </div>
              <div class="col-md-6">
                <input type="number" size="3" maxlength="3" name="maths" min="0" max="100" style="width:20%" autocomplete="off" id="class" name="class" required> /100
              </div>
            </div>
            <div class="row mt-3 mb-2">
              <div class="col-md-6 ps-5">
                <p class="pe-5"> <b>Physics</b> </p>
              </div>
              <div class="col-md-6">
                <input type="number" name="physics" min="0" max="100" style="width:20%" autocomplete="off" id="class" name="class" required> /100
              </div>
            </div>

            <div class="row mt-3 mb-2">
              <div class="col-md-6 ps-5">
                <p class="pe-5"> <b>Chemistry</b> </p>
              </div>
              <div class="col-md-6">
                <input type="number" name="chemistry" min="0" max="100" style="width:20%" autocomplete="off" id="class" name="class" required> /100
              </div>
            </div>
            <div class="row mt-3 mb-2">
              <div class="col-md-6 ps-5">
                <p class="pe-5"> <b>English</b> </p>
              </div>
              <div class="col-md-6">
                <input type="number" name="english" min="0" max="100" style="width:20%" autocomplete="off" id="class" name="class" required> /100
              </div>
            </div>
            <div class="row mt-3 mb-2">
              <div class="col-md-6 ps-5">
                <p class="pe-5"> <b>Computer</b> </p>
              </div>
              <div class="col-md-6">
                <input type="number" name="computer" min="0" max="100" style="width:20%" autocomplete="off" id="class" name="class" required> /100
              </div>
              </div>
              </div>
            
              <div class="col-md-12 p-5 text-start">
                <label for="exampleFormControlTextarea1" class="form-label"> <b>Add a remark</b> </label>
                <textarea class="form-control" name="remark" id="exampleFormControlTextarea1" style="box-shadow: none;" rows="3"></textarea>
              </div>
           


            <div class="flex mb-3f mt-2 mb-2">
              <input style="height:30px; font-size:13px;padding:2px 10px;background-color:#574b90" id="submit" name="student_marks" type="submit" value="Submit" class="btn px-5 btn-primary">
            </div>
         
          </div>
          </form>




        </div>
      </div>




      <!---------------------------------------------------------------------------------modal for update student------------------------------------------------------------------>


    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="~/Scripts/jquery_cookie.js" type="text/javascript"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>

</html>