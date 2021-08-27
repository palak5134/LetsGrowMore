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
<script>
  $(document).ready(function() {
    setTimeout(function() {
      $('.alert').hide();
    }, 2000);
  });
</script>

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
            <li class="active mt-5">Student</li>
          </a>
          <a href="student-add.php">
            <li class=" mt-5">Add</li>
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

    <div class="col-10" style="background: #F4F6F7;">



      <div id="student-add">
        <!-- <div class="col-11"> -->
        <div class="container-fluid">
          <h2 class="pt-3 mt-2 ps-1">View Students</h2>
          <?php
          $message = $_GET['message'];
          if ($message) {
            echo '
              
                        
              <div class="alert alert-warning text-center float-end mb-1" role="alert"style="width:30%" >
                <i class="fas fa-check-circle"></i>  ' . $message . '
              </div>
            ';
          } ?>


          <!-----------------------------------------------student registration form----------------------------------------->



          <div class="row g-4 list">
            <div class="mt-5">
              <form action="dashboard.php" method="post">
                <label for="class">Enter the Class : </label>

                <select name="class" class="p-2" style="border-radius: 5px;width: 100px;">

                  <option value="10" selected>10</option>
                  <option value="12">12</option>
                </select>
                <button class="btn" name="class-submit" type="submit" name="searchStu" style="background:#fc85ae"><i class="fas fa-arrow-right"></i></i></button>
              </form>

            </div>


            <div class="col-6 mt-5 list mx-auto style=" height:70vh;overflow-y:auto;">

              <script>
                function Filter() {
                  var input, filter, a, i, txtValue;
                  input = document.getElementById("nameFilter");
                  filter = input.value.toUpperCase();
                  var list = document.getElementsByClassName("list")[0];
                  var fname = list.getElementsByClassName("students-table");
                  for (i = 0; i < 5; i++) {
                    a = fname[i].getElementsByTagName("b")[0];
                    txtValue = a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      fname[i].style.display = "";
                    } else {
                      fname[i].style.display = "none";
                    }
                  }
                }
              </script>

              <?php
              if (isset($_POST['class-submit'])) {
                $class = $_POST['class'];
                echo ' <div class="d-flex mt-1">
                  <input type="text" class="form-control" id="nameFilter" style="width:50%" onkeyup="Filter()"
                    placeholder="Search for names.." title="Type in a name">


                </div>  
                  ';


                $student = new Student();
                $studentDetails = $student->getAllStudent($class);
                $total_student_count = count($studentDetails);
                $i = 0;
                $j = 0;
                foreach ($studentDetails as $rows) {
                  $per = ($rows['maths'] + $rows['chemistry'] + $rows['computer'] + $rows['english'] + $rows['physics']) / 500 * 100;

                  echo '
                 
              
                                <div class=" shadow my-3   students-table mt-2" id="students-table" style="border-radius:10px;width:43rem;" ">
                                    <div class=" fname card-body row">  
                                        <div class="col-5">
                                          <div >Name: <b>' . $rows['name'] . '</b></div>
                                          <div >Status:';
                  if ($per > 33.33) {
                    $i++;
                    echo " <span class='badge bg-success rounded-0 ms-1'>Pass</span>";
                  } else if ($rows['maths'] == 0 && $rows['chemistry'] == 0 &&  $rows['computer'] == 0 && $rows['english'] == 0 && $rows['physics'] == 0) {
                    $j++;
                    echo " <span class='badge bg-warning rounded-0 ms-1'>None</span>";
                  } else {
                    echo " <span class='badge bg-danger rounded-0 ms-1'>Fail</span>";
                  }

                  echo  ' </div> 
                                          
                                          
                                        </div>
                                    
                                        <div class="col-5">
                                          <div>RollNo.: <b>' . $rows['RollNo'] . '</b></div>
                                          
                                            <div >Percentage: <b>' . $per . ' %</b></div>
                                          
                                      
                                          
                                          </div>
                                        <div class="col-2 d-flex my-auto">

                                          

                                            <a href="updateStudent.php?rollno=' . $rows['RollNo']  . '" class="btn btn-white" type="submit" ><i class="fas fa-user-edit"></i></a>
                                      
                                            <form method="post"  action="../scripts/adding.php">
                                              <input name="rollno" type="hidden" value="' . $rows['RollNo'] . '" >
                                              <button type="submit" name="delete_student" class="btn btn-white"><i class="fas fa-user-minus"></i></button>
                                              </form>
                                        
                                        </div>
                                        
                                    </div>
                                
                                </div>
          
           
          
           
        ';
                }
                $passingPrecent = ($i / $total_student_count) * 100;
                $failed = $total_student_count - ($i + $j);
                echo ' 
            </div>


              <div class="col-5" >
                <div class="card shadow mt-4 p-3" style="width:auto; margin-left: 100px;;">
                  <b class="text-capitalize">Result</b>
                  <div class="card-body m-3 px-1 py-3 text-white" style="background-color:#9e579d;border-radius: 10px;">
                    <div class="container d-flex">
                      <div class="col-7 ps-4">
                      <b>Total Passed</b>
                    </div>
                    <div class="col-6 text-end pe-4">
                         <p>' . $i . '/' . $total_student_count . '</p> 
                        </div> 
                      </div>
                     
                    </div>
                    <div class="card-body m-3 px-1 py-3 text-white" style="background-color:#9e579d;border-radius: 10px;">
                      <div class="container d-flex">
                        <div class="col-6 ps-4">
                        <b>Total Fail</b>
                      </div>
                      <div class="col-6 text-end pe-2">
                           <p>' . $failed . '/' . $total_student_count . '</p>
                          </div> 
                        </div>
                       
                      </div>
                  </div>
                  <div class="card shadow mt-4 p-3 " style="width:auto; margin-left: 100px ;">
                    <b class="text-capitalize">Percentage</b>
                    <div class="card-body text-center m-3 px-1 py-3 text-white" style="background-color:#574b90;border-radius: 10px;height:150px;">

                      <svg height="100" width="100"viewBox="0 0 36 36" class="circular-chart orange">
                        <path class="circle-bg"
                          d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                        />
                        <path class="circle"
                          stroke-dasharray="' . $passingPrecent . ', 100"
                          d="M18 2.0845
                            a 15.9155 15.9155 0 0 1 0 31.831
                            a 15.9155 15.9155 0 0 1 0 -31.831"
                        />
                        <text x="18" y="20.35" class="percentage">' . round($passingPrecent, 0) . ' %</text>
                      </svg>
                      
                      </div>
                     
                        </div>
                    </div>
  

                </div>


              </div>
           

            </div>
          </div> 
          
       
       
                 
          ';
              }









              ?>





              <!---------------------------------------------------------------------------------modal for update student------------------------------------------------------------------>
















              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
              <script src="~/Scripts/jquery_cookie.js" type="text/javascript"></script>
              <!-- Option 2: Separate Popper and Bootstrap JS -->

              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

</body>

</html>