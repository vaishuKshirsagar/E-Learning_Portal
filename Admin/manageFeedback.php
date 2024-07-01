<?php 
include('./adminInclude/adminSessionCheck.php');
include('./adminInclude/adminHeader.php');
include('../dbConnection.php');
?>
<div class="col-sm-9 mt-5">
<div class="mx-5 mt-5">
        <!-- Table  -->
        <p class=" bg-dark text-white p-2">Manage Feedback</p>
        <?php
        $sql="SELECT * FROM feedback";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Manage</th>
                 
                </tr>
            </thead>
            <tbody>';
            while($row=$result->fetch_assoc()){
                echo '<tr>';
                echo '<th scope="row">'.$row['user_id'].'</th>';
                echo '<td>'.$row['f_content'].'</td>';
                echo '<td><form method="POST" class="d-inline">
                    <input type="hidden" name="id" value='.$row["f_id"].'>
                         <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                         <i class="fas fa-trash-alt"></i>
                         </button>
                     </form></td>';
            }
            echo '    
                </tr>
            </tbody>
        </table>';
        
            }
        
        ?>
       <?php 

         //  for deleting feedbcak
         if(isset($_REQUEST['delete'])){
            $sql="DELETE FROM feedback WHERE f_id={$_REQUEST['id']}";
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

   


























<?php 
include('./adminInclude/adminFooter.php');
?>
