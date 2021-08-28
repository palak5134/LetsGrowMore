<?php
class Dbh
{
    private $host;
    private $username;
    private $password;
    private $dbName;

    //connect method
    protected function connect()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "result";

        //intiating connection
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        return $conn;
    }
}
class Admin extends Dbh
{
    public function getAllAdmin()
    {
        $sql = "SELECT * FROM `admin`";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $adminDetails[] = $row;
            }
            return $adminDetails;
        }
    }
    public function setStatus()
    {
        $sql = "SELECT * FROM `status`";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['status'] == 0) {
                    $sql1 = "UPDATE `status` SET `status`=1";
                    $result = $this->connect()->query($sql1);
                } else {
                    $sql1 = "UPDATE `status` SET `status`=0";
                    $result = $this->connect()->query($sql1);
                }
                return $result;
            }
        }
    }
    public function getStatus()
    {
        $sql = "SELECT * FROM `status`";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $status[] = $row;
            }
            return $status;
        }
    }
}
class Student extends Dbh
{
    public function students()
    {
        $sql = "SELECT * FROM `student` ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentDetails[] = $row;
            }
            return $studentDetails;
        }
    }
    public function getAllStudent($class)
    {
        $sql = "SELECT * FROM `student` where  `class` LIKE '$class'  ORDER BY  `RollNo`";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentDetails[] = $row;
            }
            return $studentDetails;
        }
    }
    public function getAllupdate($rollno)
    {
        $sql = "SELECT * FROM `student` where  `RollNO` LIKE '$rollno' ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentDetails[] = $row;
            }
            return $studentDetails;
        }
    }
    public function getstudentInfo($name, $RollNo, $class, $age, $dob,)
    {
        $sql = "INSERT INTO `student` (`id`,`name`, `RollNo` ,`class`,`Age`,`dob`)
        VALUES (NULL,'$name', '$RollNo', '$class','$age','$dob')";
        $res = $this->connect()->query($sql);
        return $res;
    }
    public function getstudentMarks($maths, $chemistry, $computer, $physics, $english, $remark, $rollno)
    {
        $sql = "UPDATE `student` SET `maths`='$maths',`chemistry`='$chemistry' ,`physics`='$physics' ,`computer`='$computer' ,`english`='$english',`remark`='$remark' WHERE `RollNo`='$rollno'";
        $res = $this->connect()->query($sql);
        return $res;
    }

    public function searchStudent($class, $rollno)
    {
        $sql = "SELECT * FROM `student` where `RollNo` LIKE '$rollno' AND  `class` LIKE '$class' ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentDetails[] = $row;
            }
            return $studentDetails;
        }
    }
    public function updateStudent($name,  $rollno,  $class,  $age, $maths, $physics, $chemistry, $computer, $english, $remark)
    {
        $sql = "UPDATE `student` SET `name`='$name',  `Class`='$class', `Age`='$age', `maths`='$maths',`chemistry`='$chemistry' ,`physics`='$physics' ,`computer`='$computer' ,`english`='$english',`remark`='$remark' WHERE `RollNo`='$rollno' ";
        $res = $this->connect()->query($sql);
        if ($res) {
            return $res;
        }
    }
    public function deleteStudent($rollno)
    {
        $sql = "DELETE FROM `student` WHERE `RollNo`  ='$rollno'";
        $result = $this->connect()->query($sql);
        return $result;
    }
    public function checkRollno($rollno)
    {
        $sql = "SELECT * FROM `student` where  `RollNO` = '$rollno' ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $studentDetails[] = $row;
            }
            return $studentDetails;
        }
    }
}
