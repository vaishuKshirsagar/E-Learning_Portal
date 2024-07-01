
<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
?>

<div class="col-sm-9 mt-5">
        <!-- Table  -->
        <p class=" bg-dark text-white p-2">List of Courses</p>
        <?php 
        $sql ="SELECT * FROM course_details";
        $result = $conn->query($sql);
        if(@$result->num_rows > 0)
        {
          echo' <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Lessons</th>

                </tr>
            </thead>
            <tbody>';
                while( $row=$result->fetch_assoc()){
             echo  ' <tr>
                    <th scope="row">'.$row['course_id'].'</th>
                    <td>'.$row['course_name'].'</td>
                    <td>
                    
                    <form action="editCourse.php" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                            <i class="far fa-edit"></i>
                        </button>
                    </form>
          
                
                   <form method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["course_id"].'>
                        <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>    
                    </td>

                    <td>
                    <form  action="addLesson.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-success" name="addLesson" value="addLesson">
                    <i class="fas fa-download fa-1x"> Add</i>
                    </button>
                   </form>
                    <form  action="lessons.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                         <button type="submit" class="btn btn-success" name="Viewlessons" value="Viewlessons">
                         <i class="fa fa-eye"> View</i>
                         </button>
                     </form>
                    </td>
                    
                </tr>';
                 }
         echo'  </tbody>
        </table>';
         }

        else{
         echo '<div class="alert alert-warning col-sm-3 ml-5 mt-2">No Any Courses  !</div>';
            }
        //  for deleting course
            if(isset($_REQUEST['delete'])){
                $sql="DELETE FROM course_details WHERE course_id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo "Unable to delete data";
                }
            }
            //deleting lessons based on courses
            if(isset($_REQUEST['delete'])){
               
                $sql="DELETE FROM lesson_details WHERE course_id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo "Unable to delete data";
                }
            }

             //deleting video Tutorials  based on courses
             if(isset($_REQUEST['delete'])){
               
                $sql="DELETE FROM video_tutorials WHERE course_id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo "Unable to delete data";
                }
            }

             

          //delete lessons 
            if(isset($_REQUEST['delete_lesson'])){
                $sql="DELETE FROM lesson_details WHERE lesson_id={$_REQUEST['id']}";
                
                if($conn->query($sql)==TRUE){
                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo 'Unable to delete data';
                }
            }

            ?>
    </div>
</div>

<!-- div row close from header  -->
<div>
    <a class="btn btn-danger box" href="./addCourse.php">
        <i class="fas fa-plus fa-2x"></i>
</a>
</div>
</div>
<!-- div container-fluid close from header  -->


<?php 
include('./adminInclude/adminFooter.php');
?>