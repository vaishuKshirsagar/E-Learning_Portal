<?php
include('../dbConnection.php');
if(isset($_REQUEST['lessons'])){
                $sql="SELECT lesson_data FROM lesson_details WHERE lesson_id={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                if($result->num_rows > 0){?>
                    <iframe class="embed-responsive-item" src="<?php 
               echo  $row['lesson_data'];
            ?>" allowfullscreen width="100%" height="100%">
           </iframe><?php
                }
                else{
                    echo "No Data Found";
                }
            }
?>