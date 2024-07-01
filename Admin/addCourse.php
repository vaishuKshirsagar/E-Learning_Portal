<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
// insert course data 
if(isset($_REQUEST['courseSubmitBtn'])){
    ///checking for empty fields
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_FILES['course_img'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        $course_name=$_REQUEST['course_name'];
        $course_desc=$_REQUEST['course_desc'];
        $course_img=$_FILES['course_img']['name'];
        $course_img_temp=$_FILES['course_img']['tmp_name'];
        $img_folder='../image/courseimg/'.$course_img;
        move_uploaded_file($course_img_temp, $img_folder);
        $sql="INSERT INTO course_details(course_name, course_desc, course_img) VALUES('$course_name', '$course_desc', '$img_folder') ";
        
        if($conn->query($sql)==TRUE)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
    
        }
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Course</div>';
        }
    }
   
}
?>

<!--  Start Add new course form  -->
<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="mb-4">
            <label for="course_desc">Course Description</label>
            <textarea  class="form-control" id="course_desc" name="course_desc" row=2></textarea>
        </div>
        <div class="mb-4">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" id="course_img" name="course_img"/>
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End Add new course form  -->

<?php 
include('./adminInclude/adminFooter.php');
?>
