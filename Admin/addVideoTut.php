<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
// insert Video Tutorial data 
if(isset($_REQUEST['videoSubmitBtn'])){
    ///checking for empty fields
    if(($_REQUEST['courseID'] == "") ||($_REQUEST['course_name'] == "") ||($_REQUEST['video_topic'] == "") ||($_REQUEST['video_link'] == "")){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        $course_id=$_REQUEST['courseID'];
        $course_name=$_REQUEST['course_name'];
        $video_topic=$_REQUEST['video_topic'];
        $video_link=$_REQUEST['video_link'];
        $convert_link=str_replace("watch?v=", "embed/",$video_link);
        $sql="INSERT INTO video_tutorials(course_name, video_topic, video_link, course_id) VALUES('$course_name', ' $video_topic', '$convert_link', '$course_id')";
        
        if($conn->query($sql)==TRUE)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Video Tutorial Added Successfully</div>';
    
        }
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to add Video Tutorial</div>';
        }
    }
   
}
?>
<!-- fetching course name based on course id  -->
<div class="col-auto">
    <form action="" class="mt-3 form-check-inline d-print-none">
    <div class="row">
        <div  class="col-auto">
            <label for="checkid" class="form-label-inline"> Enter Course ID</label></div>
      <div  class="col-auto">
     <input type="text" class="form-control ml-3 " id="checkid" name="checkid"></div>
<div  class="col-auto">
<button type="submit" class="btn btn-danger">Search</button>
</div>

</div>  
</form>
</div>
<?php 
$sql="SELECT course_id FROM course_details";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id']){
        $sql="SELECT * FROM course_details WHERE course_id={$_REQUEST['checkid']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        ?>
<!--  Start Add new Video Tutorial form  -->
<div class="col-sm-5 mt-5 ms-10" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Add New Video Tutorial</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="courseID">Course ID</label>
            <input type="text" class="form-control" id="courseID" name="courseID"
            value="<?php if(isset($row['course_id'])){
                echo $row['course_id'];
                }?>"
           readonly >
        </div>
        <div class="mb-4">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" 
            value="<?php if(isset($row['course_name'])){
                echo $row['course_name'];
                }?>" readonly>
        </div>
        <div class="mb-4">
            <label for="video_topic">Topic Name</label>
            <input type="text" class="form-control" id="video_topic" name="video_topic" >
        </div>

        
        <div class="mb-4">
            <label for="video_link">Video_link</label>
            <input type="text" class="form-control" id="video_link" name="video_link">

        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="videoSubmitBtn" name="videoSubmitBtn">Submit</button>
            <a href="videoTutorial.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End Add new Video Tutorial form  -->
<?php
    }
}
?>



<?php 
include('./adminInclude/adminFooter.php');
?>
