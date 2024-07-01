<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');

//Update course details
if(isset($_REQUEST['courseUpdateBtn'])){
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_FILES['course_img'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        //Assigning user values to variable
       $cid=$_REQUEST['course_id'];
       $cname=$_REQUEST['course_name'];
       $cdesc=$_REQUEST['course_desc'];
       $cimg=$_FILES['course_img']['name'];
       if($cimg != ""){
        $course_img_temp=$_FILES['course_img']['tmp_name'];
        $img_folder='../image/courseimg/'.$cimg;
        move_uploaded_file($course_img_temp, $img_folder);
       }
       else{
        $img_folder=$_REQUEST['old_img'];
       }
       $sql="UPDATE course_details SET course_id='$cid', course_name='$cname', course_desc='$cdesc', course_img='$img_folder' WHERE course_id='$cid'";

       if($conn->query($sql)==TRUE)
       {
           $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update Successfully</div>';
   
       }
       else{
           $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update Course</div>';
       }
    }
}
?>

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Update Course Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM course_details WHERE course_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if(isset($row['course_id'])){
                echo $row['course_id'];
                }
                ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" 
            value="<?php if(isset($row['course_name'])){
                echo $row['course_name'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="course_desc">Course Description</label>
            <textarea  class="form-control" id="course_desc" name="course_desc" row=2><?php if(isset($row['course_desc'])){
                echo $row['course_desc'];
                }
                ?></textarea>
        </div>
        <div class="mb-4">
            <label for="course_img">Course Image</label>
            <img src="<?php 
            if(isset($row['course_img'])){
                $oldfile = $row['course_img'];
                echo $oldfile;
                }
            ?>" alt="" class="img-thumbnail" width="250" height="200">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
            <input type="hidden" name="old_img" 
            value="<?php if(isset($row['course_img'])){
                echo $row['course_img'];
                }
                ?>">    
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="courseUpdateBtn" name="courseUpdateBtn">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
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