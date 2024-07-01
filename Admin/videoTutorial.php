
<?php
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
?>

<div class="col-sm-9 mt-5">
        <!-- Table  -->
        <p class=" bg-dark text-white p-2">List of Video Tutorials</p>
        <?php 
        $sql ="SELECT * FROM video_tutorials";
        $result = $conn->query($sql);
        if(@$result->num_rows > 0)
        {
          echo' <table class="table">
            <thead>
                <tr>
                    <th scope="col">VideoTutorial ID</th>
                    <th scope="col"> Course Name</th>
                    <th scope="col"> Topic Name</th>
                    <th scope="col"> Video Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';
                while( $row=$result->fetch_assoc()){
             echo  ' <tr>
                    <th scope="row">'.$row['videotut_id'].'</th>
                    <td>'.$row['course_name'].'</td>
                    <td>'.$row['video_topic'].'</td>
                    <td>'.$row['video_link'].'</td>
                    <td>
                    
                    <form action="editVideoTutorial.php" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='.$row["videotut_id"].'>
                        <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">
                            <i class="far fa-edit"></i>
                        </button>
                    </form>
          
                
                   <form method="POST" class="d-inline">
                   <input type="hidden" name="id" value='.$row["videotut_id"].'>
                        <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>    
                    </td>

                    
                </tr>';
                 }
         echo'  </tbody>
        </table>';
         }

        else{
         echo '<div class="alert alert-warning col-sm-3 ml-5 mt-2">No Any Video Tutorial !</div>';
            }
        //  for deleting course
            if(isset($_REQUEST['delete'])){
                $sql="DELETE FROM video_tutorials WHERE videotut_id={$_REQUEST['id']}";
                if($conn->query($sql)==TRUE){
                    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                }
                else{
                    echo "Unable to delete data";
                }
            }
           

         

            ?>
    </div>
</div>

<!-- div row close from header  -->
<div>
    <a class="btn btn-danger box" href="./addVideoTut.php">
        <i class="fas fa-plus fa-2x"></i>
</a>
</div>
</div>
<!-- div container-fluid close from header  -->


<?php 
include('./adminInclude/adminFooter.php');
?>