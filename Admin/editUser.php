<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');

//Update user details
if(isset($_REQUEST['userUpdateBtn'])){
    if(($_REQUEST['user_name'] == "") || ($_REQUEST['user_email'] == "") || ($_REQUEST['user_pass'] == "") || ($_REQUEST['user_occ'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        //Assigning user values to variable
       $uid=$_REQUEST['user_id'];
       $uname=$_REQUEST['user_name'];
       $uemail=$_REQUEST['user_email'];
       $upass=$_REQUEST['user_pass'];
       $uocc=$_REQUEST['user_occ'];
      

       $sql="UPDATE user_details SET user_id='$uid', user_name='$uname', user_email='$uemail', user_pass='$upass' , user_occ='$uocc' WHERE user_id='$uid'";

       if($conn->query($sql)==TRUE)
       {
           $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update Successfully</div>';
   
       }
       else{
           $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update user</div>';
       }
    }
}
?>

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Update User Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM user_details WHERE user_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" 
            value="<?php if(isset($row['user_id'])){
                echo $row['user_id'];
                }
                ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="user_name"> Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" 
            value="<?php if(isset($row['user_name'])){
                echo $row['user_name'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="user_email"> Email</label>
            <input type="text" class="form-control" id="user_email" name="user_email" 
            value="<?php if(isset($row['user_email'])){
                echo $row['user_email'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="user_pass"> Password</label>
            <input type="password" class="form-control" id="user_pass" name="user_pass" 
            value="<?php if(isset($row['user_pass'])){
                echo $row['user_pass'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="user_occ">Occupation</label>
            <input type="text" class="form-control" id="user_occ" name="user_occ" 
            value="<?php if(isset($row['user_occ'])){
                echo $row['user_occ'];
                }
                ?>">
        </div>
        
       
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="userUpdateBtn" name="userUpdateBtn">Update</button>
            <a href="manageUser.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 







<?php 
include('./adminInclude/adminFooter.php');
?>