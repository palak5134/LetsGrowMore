<?php
$expire=time()+60*60*24*30;
include '../classes/dbh.class.php';

if (isset($_POST['adminLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password']; 
    $admin=new Admin();
    $admin_details=$admin->getAllAdmin();
    foreach ($admin_details as $credentials){

        if($credentials['password']==$password && $credentials['username']==$username){
            header("location:../admin/main-dashboard.php");
            //setting cookies
            setcookie('user',$credentials['username'],$expire,'/');
            $cookiedata=hash('ripemd160',$credentials['fullname']);
            setcookie('admin',$cookiedata,$expire,'/');
            break;   
        }
        else{
            header("Location: ../admin/admin-login.php?message=Wrong credentials");

        } 
    }
}
if (isset($_POST['logout'])){
    setcookie('user',"",time()-3600,'/');
    setcookie('admin',"",time()-3600,'/');
    header("Location: ../index.php");

}