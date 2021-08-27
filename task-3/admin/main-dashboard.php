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
  <title>Hello, world!</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      setTimeout(function () {
        $('.alert').hide();
      }, 2000);

      
     

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
            <li class="active">Dashboard</li>
            
          </a>
          <a href="dashboard.php">
            <li  class="mt-5">Student</li>

          </a>
          <a href="student-add.php">
            <li class="mt-5">Add</li>
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
     <div class="container">
      <div class="col-md-12 mx-auto ps-4 mt-5">
        <div class="row">
          <div class="col-6">
            <div class="card shadow p-5" style="height:18rem;width:500px; border-radius:20px;">
              <div class="d-flex">
                <i class="fas fa-user-graduate" style="font-size:30px;color:#574b90  "></i>
                <b class="ps-4 mt-1">Student-details</b>
              </div>
              <!--------------total student----------------------------->
              <?php
                  $student=new Student();
                  $total=count($student->students());
                  $i=0;$j=0;
                  echo'
                    <p class="mt-4"> Class 10th<span class="float-end">'.count($student->getAllStudent(10)).'</span></p>
                    <p class="mt-2">Class 12th <span class="float-end"> '.count($student->getAllStudent(12)).'</span></p>
              
                    <p class="mt-2 p-3" style="background-color:#574b9030;border-radius:5px;"> <b>Total<span class="float-end">'.$total.'</span></b></p>
                 


                  


            </div>

          </div>
          <div class="col-6">
            <div class="card shadow" style="height:18rem; width:500px; border-radius:20px;">
              <div class="card shadow p-5" style="height:18rem;width:500px; border-radius:20px;">
                <div class="d-flex">
                  <i class="fas fa-chart-pie" style="font-size:30px;color:#574b90  "></i>
                  <b class="ps-4 mt-1" >Performance</b>
                </div>';
                     
                     $total_students=$student->students();
                    
                    
                     foreach ($total_students as $rows){
                      $per = ($rows['maths'] + $rows['chemistry'] + $rows['computer'] + $rows['english'] + $rows['physics']) / 500 * 100;
                      if ($per > 33.33) {
                        $i++;
                      }
                      else if($rows['maths'] ==0 && $rows['chemistry']==0 &&  $rows['computer']==0 && $rows['english'] ==0 && $rows['physics']==0){
                        $j++;

                      } 
                    }
                  
                    $passingPrecent = ($i / $total) * 100;
                    $failed = (($total-($i+$j))/$total)*100;
                   
                  

                  
                    
                  
                  echo'<div class="mt-3 text-center mx-auto">
                    <svg height="100" width="100" viewBox="0 0 36 36" class="circular-chart orange">
                      <path class="circle-bg" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                      <path class="circle" stroke-dasharray="'.$passingPrecent.', 100" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                       
                      <text x="18" y="20.35" class="percentage-overall">'.round($passingPrecent).'</text>
                    </svg>
                    <svg height="100" width="100" viewBox="0 0 36 36" class="circular-chart orange">
                      <path class="circle-bg-fail" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                      <path class="circle-fail" stroke-dasharray="'. $failed .', 100" d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831" />
                       
                      <text x="18" y="20.35" class="percentage-overall">'. round($failed) .'%</text>
                    </svg>
                    <div class="d-flex mt-4 ">
                    <p class="ps-4" style="font-size:12px;"><i style="color:green" class="fas fa-circle"></i> Passed</p>
                    <p class="ps-5"style="font-size:12px;"><i style="color:red;" class="fas fa-circle"></i>Failed</p>
                  </div>
                  </div>

               
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="col-md-12 mx-auto ps-4 mt-5 ">
        <div class="row">
          <!-- <div class="col-6">
            <div class="card shadow p-5" style="height:18rem; width:500px; border-radius:20px;">
            <div class="d-flex">
            <i class="fas fa-marker" style="font-size:30px;color:#574b90  "></i>
            <b class="ps-4 mt-1">Result Declaration</b>

            
          </div>
            </div>
          </div> -->
          <div class="col-6">
            <div class="card shadow p-5" style="height:18rem; width:500px; border-radius:20px;">
              <div class="d-flex">
                <i class="fas fa-poll" style="font-size:30px;color:#574b90  "></i>
                <b class="ps-4 mt-1">Result Declaration</b>
                
              </div>
              <p class="mt-5">Result status:</p>
              <form method="post" action="../scripts/adding.php">
              <div class="d-grid gap-2 col-12 mx-auto">
                <button class="btn btn-warning btn-large" type="submit"  name="declare" type="submit"  color:white;border:none;"><b>Change Status</b></button>
              </div>
              </form>
             
              <small class="mt-2" style="color:grey;">Click to change status</small>
              ';
                $admin=new Admin();
                $status=$admin->getStatus();
                foreach($status as $rows){
                  if($rows['status']==1){
                    echo '<span style="color:green;"><b>declared</b>';
                  }else if($rows['status']==0){
                    echo'<span style="color:red;"><b>Not declared</b>';
                  }
                }
               
            echo' </span> </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    ';
                
                
                ?>








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