<?php 
if(!isset($_SESSION)){
    session_start();
}
include('./userInclude/userHeader.php');
include_once('../dbConnection.php');

 if(isset($_SESSION['is_Login'])){
    $userEmail= $_SESSION['logemail'];
}
else{
echo "<script> location.href='../index.php';</script>";
}

if(isset($_REQUEST['userPassChangeBtn'])){
    if(($_REQUEST['userNewPass']== "")){
        //msg displayed if required fields are missing
        $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill all Fields</div>';
    }
    else{
        $sql="SELECT * FROM user_details WHERE user_email='$userEmail'";
         $result= $conn->query($sql);
        if($result-> num_rows== 1){
            $userPass = $_REQUEST['userNewPass'];
            $sql= "UPDATE user_details SET user_pass='$userPass' WHERE user_email= '$userEmail'";
            if($conn-> query($sql)==TRUE){
                // below message display on form submit success
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated successfully</div>';
            }
            else{
                 // below message display on form submit success
                 $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update</div>';
            }
        }
    }
}

?>

<div class="col-sm-9 col-md-10 mt-5">
    <div class ="row">
    <div class="col-sm-6">
    <form class="mx-5" method="POST" >
        <div class="mb-3">
        <label for="inputEmail"> Email </label>
            <input type="email" class="form-control" id="userEmail" value="<?php echo $userEmail ?>" readonly>
        </div>
        <div class="mb-3">
        <label for="inputNewPass"> New Password </label>
            <input type="password" class="form-control" id="inputNewPass" placeholder="New Password" Name="userNewPass"> 
        </div>
        <button type="submit" class="btn btn-primary mr-4 mt-4"
        name="userPassChangeBtn"> Update</button>
        <button type="reset" class="btn btn-primary mt-4"
        >Reset</button>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
</form>  
</div>
</div>
</div>
</div> <!--Close row Div from header file--> 


<?php 
    include('./userInclude/userFooter.php');
?>    