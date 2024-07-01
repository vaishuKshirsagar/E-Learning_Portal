<?php
if(!isset($_SESSION)){
    session_start();
}
include_once('../dbConnection.php');
//checking Email Already Register
if(isset($_POST['checkemail']) && isset($_POST['uemail']) ){
    $uemail=$_POST['uemail'];
    $sql="SELECT user_email FROM user_details WHERE user_email='".$uemail."'";
    $result=$conn->query($sql);
    $row=$result->num_rows;
    echo json_encode($row);  
}

//Insert User
if(isset($_POST['usersignup']) && isset($_POST['uname']) && isset($_POST['uemail']) && isset($_POST['upass']))
{
    $uname=$_POST['uname'];
    $uemail=$_POST['uemail'];
    $upass=$_POST['upass'];

    $sql="INSERT INTO user_details(user_name, user_email, user_pass)VALUES('$uname', '$uemail', '$upass')";
   if( $conn->query($sql)==TRUE){
       echo json_encode("ok");
   }
   else{
       echo json_encode("failed");
   }
}

//user login verification
if(!isset($_SESSION['is_Login'])){
if(isset($_POST['checklogemail']) && isset($_POST['logemail']) && isset($_POST['logpass'])){
    $logemail=$_POST['logemail'];
    $logpass=$_POST['logpass'];
    
    $sql="SELECT user_email, user_pass FROM user_details WHERE user_email='".$logemail."' AND user_pass='".$logpass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row === 1){
        $_SESSION['is_Login']=true;
        $_SESSION['logemail']=$logemail;
        echo json_encode($row);
    }
    else if($row === 0){
        echo json_encode($row);
    }
}
}
?>
