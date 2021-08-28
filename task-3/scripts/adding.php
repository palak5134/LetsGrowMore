<?php
include '../classes/dbh.class.php';

if (isset($_POST['studentinfo'])){
    $name=$_POST['name'];
    $RollNo=$_POST['RollNo'];
    $class=$_POST['class'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
   
    
    $student = new Student();
   
     
      $checkrollno=$student->checkRollno($RollNo);
      if($checkrollno){
       
       
        header("Location: ../admin/student-add.php?error='Roll No already exist'");

      
    }
    else{
      $studentInput=$student-> getstudentInfo($name,$RollNo,$class,$age,$dob);
      if($studentInput){
        header("Location: ../admin/student-add.php?message='student added successfully'");
      }

    }
   
   
  
  }
 

  if (isset($_POST['update_student'])){
    $name=$_POST['name'];
    $rollno=$_POST['rollno'];
    $class=$_POST['class'];
    $age=$_POST['age'];
    // $dob=$_POST['dob'];
    $maths=$_POST['maths'];
    $physics=$_POST['physics'];
    $chemistry=$_POST['chemistry'];
    $computer=$_POST['computer'];
    $english=$_POST['english'];
    $remark=$_POST['remark'];
    echo $name,$maths;
    $student=new Student();
    $update=$student->updateStudent( $name,  $rollno,  $class,  $age, $maths,$physics,$chemistry,$computer,$english,$remark);
    if($update){
        header("Location: ../admin/updateStudent.php?rollno=$rollno&&message='Student Updated successfully'");
    }else{
      echo "no" ;
    }
  }


  if (isset($_POST['student_marks'])){
    $rollno=$_POST['rollno'];
    $maths=$_POST['maths'];
    $physics=$_POST['physics'];
    $chemistry=$_POST['chemistry'];
    $computer=$_POST['computer'];
    $english=$_POST['english'];
    $remark=$_POST['remark'];
    $student = new Student();
    $studentInput=$student-> getstudentMarks($maths, $chemistry, $computer, $physics, $english, $remark,$rollno);
    if($studentInput){
      header("Location: ../admin/add_result.php?message='Student added successfully'");

      
    }
  }
  

  if (isset($_POST['delete_student'])){
    $rollno=$_POST['rollno'];
    // echo $rollno;
    $student=new Student();
    echo $delete=$student->deleteStudent($rollno);
  
    if($delete){
      header("Location: ../admin/dashboard.php?message=Deleted successfully");
    }

  }
  if (isset($_POST['declare'])){
     $admin=new Admin();
     $status=$admin->setStatus();
     if($status){
       header("Location: ../admin/main-dashboard.php");
     }

  };