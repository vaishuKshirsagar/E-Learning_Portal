<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
//Update admin Password
if(isset($_REQUEST['adminPassUpdateBtn'])){
    if($_REQUEST['admin_pass']==""){
        //message displayed if requried field missing
        $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
     $sql="SELECT * FROM admin WHERE admin_email='$adminEmail'";
     $result=$conn->query($sql);
     if($result->num_rows==1){
         $adminPass=$_REQUEST['admin_pass'];
         $sql="UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";

         if($conn->query($sql)==TRUE)
         {
             $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Password Change Successfully</div>';
     
         }
         else{
             $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Change Password</div>';
         }
     }
    }
}
?>

<!-- form admin update password  -->
<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Change Password</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="admin_email">Email</label>
            <input type="email" class="form-control" id="_email" name="admin_email" value="<?php echo $adminEmail?>" readonly>
        </div>
        <div class="mb-4">
            <label for="admin_pass"> New Password</label>
            <input type="password" class="form-control" id="admin_pass" name="admin_pass" placeholder="New Password">
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="adminPassUpdateBtn" name="adminPassUpdateBtn">Update</button>
            <a href="adminDashboard.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($passmsg)){echo $passmsg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End admin password change form  -->