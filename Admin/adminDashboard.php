<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');

$sql="SELECT * FROM course_details";
$result=$conn->query($sql);
$total_course=$result->num_rows;

$sql="SELECT * FROM video_tutorials";
$result=$conn->query($sql);
$total_vidTut=$result->num_rows;

$sql="SELECT * FROM quiz";
$result=$conn->query($sql);
$total_quiz=$result->num_rows;

?>

<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
                <div class="card-header"> Courses</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $total_course?></h4>
                    <a class="btn text-white" href="courses.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem;">
                <div class="card-header">Video Tutorial</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $total_vidTut?></h4>
                    <a class="btn text-white" href="videoTutorial.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem;">
                <div class="card-header">Quiz</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $total_quiz?></h4>
                    <a class="btn text-white" href="Quiz.php">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center">
        <!-- Table  -->
        <p class=" bg-dark text-white p-2">Enrolled courses</p>
        <?php
        $sql="SELECT * FROM enrolled_courses";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">User Email</th>
                 
                </tr>
            </thead>
            <tbody>';
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                   echo '<th scope="row">'.$row['courseId'].'</th>';
                   
                    echo '<td>'.$row['courseName'].'</td>';
                    echo '<td>'.$row['userEmail'].'</td>';
            }    
               echo' </tr>
            </tbody>
        </table>';
            
        }
        
        
        ?>
        
    </div>

    <div class="mx-5 mt-5 text-center">
        <!-- Table  -->
        <p class=" bg-dark text-white p-2">Enrolled Video Tutorials</p>
        <?php
        $sql="SELECT * FROM enrolled_videotut";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">User Email</th>
                 
                </tr>
            </thead>
            <tbody>';
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                   echo '<th scope="row">'.$row['courseId'].'</th>';
                   
                    echo '<td>'.$row['courseName'].'</td>';
                    echo '<td>'.$row['userEmail'].'</td>';
            }       
               echo' </tr>
            </tbody>
        </table>';
            
        }
        
        
        ?>
        
    </div>





</div>
</div>
</div>
<!-- Div row close from header -->
</div>
<!-- Div container-fluid close from header  -->
</div>

<?php 
include('./adminInclude/adminFooter.php');
?>
