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
    }

    if(isset($_REQUEST['submitFeedbackBtn'])){
        if(($_REQUEST['f_content']== "")){
            //msg displayed if required fields are missing
            $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill all Fields</div>';
        }
        else{
            $fcontent = $_REQUEST["f_content"];
            $sql = "INSERT INTO feedback (f_content, user_id) VALUES ('$fcontent','$userId')";
            if($conn-> query($sql)==TRUE){
                // below message display on submit success
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Submitted successfully</div>';
            }
            else{
                 // below message display on submit success
                 $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit</div>';
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
        <label for="f_content"> Write Feedback: </label>
            <textarea class="form-control" id="f_content" name="f_content" row=2> </textarea>
        </div>
        <br><button type="submit" class="btn btn-primary"
        name="submitFeedbackBtn"> Submit</button></br>
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
</form>
</div>
</div> <!--Close row Div from header file-->

    <?php 
    include('./userInclude/userFooter.php');
    ?>    