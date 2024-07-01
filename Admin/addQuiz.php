<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
// insert Quiz data 
if(isset($_REQUEST['quizSubmitBtn'])){
    ///checking for empty fields
    if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['quizLink'] == "") ){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields !</div>';
    }
    else{
       
        $quizLink=$_REQUEST['quizLink'];
        $course_id=$_REQUEST['course_id'];
        $course_name=$_REQUEST['course_name'];
       
      
        $sql="INSERT INTO quiz(course_id, course_name,quizLink) VALUES('$course_id', '$course_name','$quizLink') ";
        if($conn->query($sql)==TRUE)
        {
            $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Quiz Added Successfully</div>';
    
        }
        else{
            $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Quiz</div>';
        }
    }
   
}

?>

<!--  Start Add new Quiz form  -->

<div class="col-sm-5 mt-5 ms-5" style="height:auto ;background-color:#E8E8E8;">
    <h3 class="text-center mt-5 mb-4">Add New Question</h3>
    <?php
    if(isset($_REQUEST['addQuestions'])){
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
            <input type="hidden" class="form-control" id="question_no" name="question_no" value="<?php echo $next;?>"readonly>
        </div>
    
        <div class="mb-4">
            <label for="correct_op">Quiz Form Link:</label>
            <input type="text" class="form-control" id="quizLink" name="quizLink">
        </div>
        
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-danger" id="quizSubmitBtn" name="quizSubmitBtn">Submit</button>
            <a href="Quiz.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)){echo $msg; }?>
</form>
</div>
<!-- Div row close from header -->
</div> 
<!-- div container-fluid close from header  -->
</div> 
<!--  End Add new Quiz form  -->

<?php 
include('./adminInclude/adminFooter.php');
?>
