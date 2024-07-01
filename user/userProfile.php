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
    $sql="SELECT * FROM user_details WHERE user_email='$userEmail'";
    $result= $conn->query($sql);
    if($result-> num_rows== 1){
        $row=$result->fetch_assoc();
        $userId=$row["user_id"]; 
        $userName=$row["user_name"];
        $userOcc=$row["user_occ"];
        $userImg=$row["user_img"]; 
    }

    if(isset($_REQUEST['updateUserNameBtn'])){
        if(($_REQUEST['userName']=="")  ){
            //msg displayed if required fields are missing
            $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill all Fields</div>';
        }
        else{
            $userName= $_REQUEST["userName"];
            $userOcc= $_REQUEST["userOcc"];
            $user_img= $_FILES['userImg']['name'];
            if($user_img != ""){
            $user_img_temp= $_FILES['userImg']['tmp_name'];
            $img_folder='../image/userImage/'.$user_img;
            move_uploaded_file($user_img_temp, $img_folder);
            }
            else{
                $img_folder=$_REQUEST['old_img'];
            }
            $sql = "UPDATE user_details SET user_name ='$userName', user_occ='$userOcc', user_img ='$img_folder' WHERE user_email='$userEmail'";
            if($conn-> query($sql)==TRUE){
                // below message display on submit success
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated successfully</div>';
            }
            else{
                 // below message display on submit success
                 $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update</div>';
            }
        }
    }
?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="userId"> User ID </label>
            <input type="text" class="form-control" id="userId" name="userId" value="<?php if (isset($userId)) {echo $userId;} ?>" readonly>
        </div>
        <div class="mb-3">
        <label for="userEmail"> Email </label>
            <input type="email" class="form-control" id="userEmail" value="<?php echo $userEmail ?>" readonly>
        </div>
        <div class="mb-3">
        <label for="userName"> Name </label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?php if (isset($userName)) {echo $userName;} ?>">
        </div>
        <div class="mb-3">
            <!--User can also be adults who learn while doing the job-->
        <label for="userOcc"> Occupation </label>
            <input type="text" class="form-control" id="userOcc" name="userOcc" value="<?php if (isset($userOcc)) {echo $userOcc;} ?>">
        </div>
        <div class="form-group">
        <label for="userImg"> Upload image </label>
            <br><input type="file" class="form-control-file" id="userImg" name="userImg" ></br>
            <input type="hidden" name="old_img" 
            value="<?php if (isset($userImg)) {echo $userImg;} ?>">
        </div>
        <br><button type="submit" class="btn btn-primary"
        name="updateUserNameBtn"> Update</button></br>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
</form>
</div>
</div> <!--Close row Div from header file-->

<?php 
include('./userInclude/userFooter.php');
?>