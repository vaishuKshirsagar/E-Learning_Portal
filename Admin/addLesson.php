<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
// insert lesson data 
if(isset($_REQUEST['lessonSubmitBtn'])){
    ///checking for empty fields
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['lesson_name'] == "") || ($_FILES['lesson_data'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
       
        $lesson_name=$_REQUEST['lesson_name'];
        $course_id=$_REQUEST['course_id'];
        $course_name=$_REQUEST['course_name'];
        $lesson_data=$_FILES['lesson_data']['name'];
        $lesson_data_temp=$_FILES['lesson_data']['tmp_name'];
        $lesson_folder='../lessondata/'.$lesson_data;
        move_uploaded_file($lesson_data_temp, $lesson_folder);
        $sql="INSERT INTO lesson_details(lesson_name, lesson_data, course_id, course_name) VALUES('$lesson_name',  '$lesson_folder', '$course_id', '$course_name') ";

        if($conn->query($sql)==TRUE)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Successfully</div>';
    
        }
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add lesson</div>';
        }
    }
   
}
?>

<!--  Start Add new lesson form  -->

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Add New Lesson</h3>
    <?php
    if(isset($_REQUEST['addLesson'])){
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
                ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="mb-4">
            <label for="lesson_data">Lesson Data</label>
            <input type="file" class="form-control-file" id="lesson_data" name="lesson_data"/>
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End Add new lesson form  -->

<?php 
include('./adminInclude/adminFooter.php');
?>
