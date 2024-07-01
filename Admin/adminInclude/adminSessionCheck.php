<?php 
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_adminLogin'])){
 $adminEmail= $_SESSION['Adminlogemail'];
}
else{
    echo "<script> location.href='../index.php'; </script>";
}
?>