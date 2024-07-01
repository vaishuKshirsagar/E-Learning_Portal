<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
// insert user data 
if(isset($_REQUEST['newUserSubmitBtn'])){
    ///checking for empty fields
    if(($_REQUEST['user_name'] == "") || ($_REQUEST['user_email'] == "") || ($_REQUEST['user_pass'] == "") || ($_REQUEST['user_occ'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        $user_name=$_REQUEST['user_name'];
        $user_email=$_REQUEST['user_email'];
        $user_pass=$_REQUEST['user_pass'];
        $user_occ=$_REQUEST['user_occ'];

        $sql="INSERT INTO user_details( user_name, user_email, user_pass, user_occ) VALUES('$user_name', '$user_email', '$user_pass', '$user_occ') ";
        
        if($conn->query($sql)==TRUE)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">User Added Successfully</div>';
    
        }
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add User</div>';
        }
    }
   
}
?>

<!--  Start Add new user form  -->
<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Add New User</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="user_name">Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name">
        </div>
        <div class="mb-4">
            <label for="user_email">Email</label>
            <input type="text" class="form-control" id="user_email" name="user_email">
        </div>
        <div class="mb-4">
            <label for="user_pass">Password</label>
            <input type="password" class="form-control" id="user_pass" name="user_pass">
        </div>
        <div class="mb-4">
            <label for="user_occ">Occupation</label>
            <input type="text" class="form-control" id="user_occ" name="user_occ">
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="newUserSubmitBtn" name="newUserSubmitBtn">Submit</button>
            <a href="manageUser.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End Add new user form  -->

<?php 
include('./adminInclude/adminFooter.php');
?>
