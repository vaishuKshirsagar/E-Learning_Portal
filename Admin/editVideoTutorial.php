<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');

//Update Video Tutorial details
if(isset($_REQUEST['videoUpdateBtn'])){
    if(($_REQUEST['course_name'] == "")){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        //Assigning user values to variable
       $vid=$_REQUEST['videotut_id'];
       $cname=$_REQUEST['course_name'];
       $vtopic=$_REQUEST['video_topic'];
       $vlink=$_REQUEST['video_link'];
       if($vlink !=""){
        $convert_link=str_replace("watch?v=", "embed/",$vlink);
       }
      else{
        $convert_link=$_REQUEST['old_link'];
      }
       $sql="UPDATE video_tutorials SET videotut_id='$vid', course_name='$cname', video_topic='$vtopic', video_link='$convert_link' WHERE videotut_id='$vid'";

       if($conn->query($sql)==TRUE)
       {
           $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update Successfully</div>';
   
       }
       else{
           $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update Video Tutorial</div>';
       }
    }
}
?>

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Update Course Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM video_tutorials WHERE videotut_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="videotut_id">Video Tutorial  ID</label>
            <input type="text" class="form-control" id="videotut_id" name="videotut_id" 
            value="<?php if(isset($row['videotut_id'])){
                echo $row['videotut_id'];
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
            <label for="video_topic">Topic Name</label>
            <input type="text" class="form-control" id="video_topic" name="video_topic" 
            value="<?php if(isset($row['video_topic'])){
                echo $row['video_topic'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="video_link">Video Link</label>
            <iframe width="560" height="315" 
            src="<?php if(isset($row['video_link'])){
                echo $row['video_link'];
                }
                ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <input type="text" class="form-control" id="video_link" name="video_link"> 
            <input type="hidden" name="old_link" 
            value="<?php if(isset($row['video_link'])){
                echo $row['video_link'];
                }
                ?>"> 
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="videoUpdateBtn" name="videoUpdateBtn">Update</button>
            <a href="videoTutorial.php" class="btn btn-secondary">Close</a>
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