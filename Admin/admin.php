<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
//Admin login verification
if(!isset($_SESSION['is_adminLogin'])){
if(isset($_POST['checklogemail']) && isset($_POST['Adminlogemail']) && isset($_POST['Adminlogpass'])){
    $Adminlogemail=$_POST['Adminlogemail'];
    $Adminlogpass=$_POST['Adminlogpass'];
    
    $sql="SELECT admin_email, admin_pass FROM admin WHERE admin_email='".$Adminlogemail."' AND admin_pass='".$Adminlogpass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row === 1){
        $_SESSION['is_adminLogin']=true;
        $_SESSION['Adminlogemail']=$Adminlogemail;
        echo json_encode($row);
    }
    else if($row === 0){
        echo json_encode($row);
    }
}
}
?>