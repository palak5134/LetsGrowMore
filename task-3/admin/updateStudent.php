<?php

include '../classes/dbh.class.php';
error_reporting(0);
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
<?php
  $student= new Student();
  $rollno=$_GET["rollno"];
  $student_details=$student->getAllupdate($rollno);
  foreach($student_details as $rows)
  echo'
  <form action="../scripts/adding.php" method="post">
  <div class="row">
    <div class="col-2">
      <div class=" main  flex-column ps-5 text-white" style="width: 280px;">
        <h2 style="font-weight:100;" class="fw-bolder pt-5 ps-2"> Res<span class="fw-bolder"
            style="color:#fc85ae">ult</span> </h2>
        <ul class="pt-5">
        <a href="main-dashboard.php">
            <li>Dashboard</li>
            
          </a>
          <a class="active" href="dashboard.php">
            <li class="mt-5">Student</li>
          </a>
          <a href="student-add.php">
            <li class=" mt-5">Add</li>
          </a>
          <a href="add_result.php">
            <li class=" mt-5">Result</li>
          </a>
        </ul>
        
      
        


      </div>
    </div>

    <!--------------student detais---------------------------->
    
    <div class="col-10 " style="background: #F4F6F7;">
    <h2 class="pt-3 mt-2 ps-1">Update</h2>';
    $message=$_GET['message'];
    if($message){
      echo'
      
      <div class="alert alert-success text-center mx-auto mb-1" role="alert"style="width:30%" >
        <i class="fas fa-check-circle"></i>'.$message.'
      </div>
    ';  
    }

     echo'
    <div class="card shadow pt-3     mt-5 mx-auto mb-5" style="width:52rem;height:37rem;border-radius: 10px;">
      <div class="container">
      
      <div class="col-md-12 mt-3">
        <div class="row">
          <div class="col-md-6 ps-5">
           <div class="d-flex">
             <div class="col-3">
             <b class="ps-3">NAME :</b>
             </div>
             <div class="col-3">
             <input required type="text" value="'.$rows['name'].'" name="name">
             </div>

           </div>
            
          </div>
          <div class="col-md-6 ps-5">
            <div class="d-flex">
                <div class="col-3">
                <b class="ps-3">CLASS :</b>
                </div>
                <div class="col-3">
                
                <input required type="text" value="'.$rows['class'].'" name="class">
                </div>
   
              </div>
            
          </div>
        </div>
      </div>
      
      <div class="col-md-12 mt-3">
        <div class="row">
          <div class="col-md-6 ps-5">
            <div class="d-flex">
                <div class="col-3">
                <b class="ps-3">ROLL:</b>
                </div>
                <div class="col-3">
                
                    <input required type="text" value="'.$rows['RollNo'].'" name="rollno">
                </div>
   
              </div>
           
          </div>
          <div class="col-md-6 ps-5">
            <div class="d-flex">
                <div class="col-3">
                <b class="ps-3">AGE :</b>
                </div>
                <div class="col-3">
                
                    <input required type="text" value="'.$rows['Age'].'" name="age">
                </div>
   
              </div>
            
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <div class="row">
          <div class="col-md-8 p-1 " style="background:#574b9030;">
            <b class="ps-5">SUBJECT</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5">MARKS</b>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="row">
          <div class="col-md-8 p-1" style="background:#574b9030;">
            <b class="ps-5">Mathematics</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5"><input required style="width:30%"  type="text" value="'.$rows['maths'].'" name="maths"></b>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="row">
          <div class="col-md-8 p-1" style="background:#574b9030;">
            <b class="ps-5">Physics</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5"><input required style="width:30%"  type="text" value="'.$rows['physics'].'" name="physics"></b>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="row">
          <div class="col-md-8 p-1 " style="background:#574b9030;">
            <b class="ps-5">Chemistry</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5"><input required style="width:30%"  type="text" value="'.$rows['chemistry'].'"name="chemistry"></b>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="row">
          <div class="col-md-8 p-1" style="background:#574b9030;">
            <b class="ps-5">English</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5"><input required style="width:30%"  type="text" value="'.$rows['english'].'" name="english"></b>
          </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-1">
        <div class="row">
          <div class="col-md-8 p-1" style="background:#574b9030;">
            <b class="ps-5">Computer</b>
          </div>
         
          <div class="col-md-4" >
            <div class="p-2"style="background:#574b9030;" >
            <b class="ps-5"><input required style="width:30%"  type="text" value="'.$rows['computer'].'" name="computer"></b>
          </div>
          </div>

        </div>
      </div>
     
      <div class="col-md-12 mt-4 ">
      <div class="text-start ms-5">
          <b>REMARK:</b> <input required type="text" value="'.$rows['remark'].'" name="remark">        
          </div>  
      </div>
      <div class="mt-5 float-end">
        <input  style="height:30px; font-size:13px;padding:2px 10px;background-color:#574b90" name="update_student"
          value="Update" type="submit" class="btn px-5 btn-primary">
      </div>
    
   </div>
    </div>
    
</form>
   ';
 


   
     

  
  
      
    
   ?>
    
             









          



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