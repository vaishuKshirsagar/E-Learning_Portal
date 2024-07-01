<?php 
include('./userInclude/userHeader.php');
include('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_Login'])){
  $logemail=$_SESSION['logemail'];
}
else{
    echo "<script>location.href='../index.php'</script>";
}
?>
<div class="col-sm-5 mt-5 ms-5" style="height:auto ;">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center mb-3">All Video Tutorials</h4>
            <?php
            if(isset($logemail)){
                $sql="SELECT et.enroll_id, c.course_id,c.course_name,c.course_desc,c.course_img FROM 
                enrolled_videotut AS et JOIN course_details AS c ON c.course_id = et.courseId WHERE et.userEmail='$logemail'";
                $result=$conn->query($sql);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){?>
                      <div class="bg-light mb-5">
                      <h5 class="card-header"><?php echo $row['course_name'];?></h5>
                      <div class="row">
                      
                      <div class="col-sm-3">
                          <img src="<?php echo $row['course_img'];?>" class="card-img-top mt-4" style="height: 150px; width:150px ;" >
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card-body">
                            <p class="card-title"><?php echo $row['course_desc'];?></p>
                    
                    <a href="watchvideotut.php?course_id=<?php echo $row['course_id'];?>"
                    class="btn btn-primary mt-5 float-right">Watch Course</a>
                    </div>
                    </div>
                    </div>
                    </div>

<?php
                    }
                }
            }
?>
<hr/>
        </div>
        </div>
        </div>
        </div>

 <?php 
include('./userInclude/userFooter.php');
?>