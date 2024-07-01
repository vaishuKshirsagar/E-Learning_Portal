
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
                    <th scope="col">Quiz Form </th>

                </tr>
            </thead>
            <tbody>';
                while( $row=$result->fetch_assoc()){
             echo  ' <tr>
                    <th scope="row">'.$row['course_id'].'</th>
                    <td>'.$row['course_name'].'</td>
                    <td>
                    <form  action="addQuiz.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["course_id"].'>
                    <button type="submit" class="btn btn-success" name="addQuestions" value="addQuestions">
                    <i class="fas fa-download fa-1x"> Add</i>
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
       ?>
    </div>
</div>

<!-- div row close from header  -->

</div>
<!-- div container-fluid close from header  -->


<?php 
include('./adminInclude/adminFooter.php');
?>