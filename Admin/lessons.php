<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
?>

<div class="col-sm-8 mt-10 mx-3">
    <?php
if(isset($_REQUEST['Viewlessons'])){
                $sql="SELECT * FROM course_details WHERE course_id={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                 if($result->num_rows > 0){
                
                 ?>
                 <h4 class="mt-5 bg-dark text-white p-2">
                Course Name:<?php if(isset($row['course_name'])){echo $row['course_name'];}?>
                 </h4>
                 <?php          
                 //display lessons based on course_id
                 $sql="SELECT * FROM lesson_details WHERE course_id={$_REQUEST['id']}";
                 $result=$conn->query($sql);
                 if(@$result->num_rows > 0)
        {
                 echo' <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lesson ID</th>
                    <th scope="col"> Lesson Name</th>
                    <th scope="col">Lesson Data</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>';
                while( $row=$result->fetch_assoc()){
             echo  ' <tr>
                    <th scope="row">'.$row['lesson_id'].'</th>
                    <td>'.$row['lesson_name'].'</td>
                    <td>'.$row['lesson_data'].'</td>
                    <td>
                    
                    <form action="editLesson.php" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='.$row["lesson_id"].'>
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                            <i class="far fa-edit"></i>
                        </button>
                    </form>
          
                
                   <form  action="courses.php" method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["lesson_id"].'>
                        <button type="submit" class="btn btn-danger" name="delete_lesson" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </form> 
                   
                    </td>
                    </tr>';
                }
                echo'</tbody>
                </table>';
            }
            else{
                echo '<div class="alert alert-warning col-sm-3 ml-5 mt-2">No Any Lessons !</div>';
            }
             
                }
            
            }
        ?>
</div>





<?php 
include('./adminInclude/adminFooter.php');
?>