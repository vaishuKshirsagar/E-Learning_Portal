<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');

//Update lesson details
if(isset($_REQUEST['lessonUpdateBtn'])){
    if(($_REQUEST['lesson_name'] == "") ||($_FILES['lesson_data'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
        //Assigning user values to variable
       $lid=$_REQUEST['lesson_id'];
       $lname=$_REQUEST['lesson_name'];
       $ldata=$_FILES['lesson_data']['name'];
       if($ldata != ""){
        $lesson_data_temp=$_FILES['lesson_data']['tmp_name'];
        $lesson_folder='../lessondata/'.$ldata;
        move_uploaded_file($lesson_data_temp, $lesson_folder);
       }
       else{
        $lesson_folder=$_REQUEST['old_data'];
       }
       $sql="UPDATE lesson_details SET lesson_id='$lid', lesson_name='$lname', lesson_data='$lesson_folder' WHERE lesson_id='$lid'";

       if($conn->query($sql)==TRUE)
       {
           $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update Successfully</div>';
   
       }
       else{
           $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update lesson</div>';
       }
    }
}
?>

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Update lesson Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM lesson_details WHERE lesson_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="mb-4">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" 
            value="<?php if(isset($row['lesson_id'])){
                echo $row['lesson_id'];
                }
                ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" 
            value="<?php if(isset($row['lesson_name'])){
                echo $row['lesson_name'];
                }
                ?>">
        </div>
        <div class="mb-4">
            <label for="lesson_data">Lesson Data</label>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php 
            if(isset($row['lesson_data'])){
               echo  $row['lesson_data'];
                }
            ?>" allowfullscreen>
           </iframe>
            </div>           
            <input type="file" class="form-control-file" id="lesson_data" name="lesson_data">
            <input type="hidden" name="old_data" 
            value="<?php if(isset($row['lesson_data'])){
                echo $row['lesson_data'];
                }
                ?>">    
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="lessonUpdateBtn" name="lessonUpdateBtn">Update</button>
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