<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Course</title>

    <!-- Bootstrap css  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

        <!-- Font Awesome CSS  -->
        <link rel="stylesheet" href="../css/all.min.css">

        <!-- Google Font  -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

<!-- Custom CSS  -->
<link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>
    <div class="container-fluid  p-2" style="margin-left:10px; background-color: #225470;">
        <h3 class=" text-center text-white p-2">Welcome to SkillUps</h3>
        <a class="btn btn-danger" href="./myCourses.php"> My Courses</a>
</div>

<?php
  
  if(isset($_GET['course_id'])){
    $course_id=$_GET['course_id'];

  }
  
  ?>


<div class="container mt-5 " style=" margin-left:300px">
  <div class="row">
  <table class="table table-bordered table-hover" style="width: 1000px;"> 
      <thead>
        <tr>
          <th scope="col">Lesson No.</th>
          <th scope="col">Lesson Name</th>
        
</tr>
</thead>
  <tbody>
    <?php  
    $sql ="SELECT * FROM lesson_details WHERE course_id='$course_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
      $num=0;
      while($row=$result->fetch_assoc()){
        $num++;
      echo ' <tr>
      <th scope="row">'.$num.'</th>
      <td>'.$row['lesson_name'].'
      
      <form  action="viewPPT.php" method="POST" class="d-inline">
      <input type="hidden" name="id" value='.$row["lesson_id"].'>
           <button type="submit" class="btn btn-success float-end" name="lessons" value="lessons">
           <strong> View </strong>
           </button>
       </form>
      </td>
</tr>';
      }
    }
    ?>
   
   
</tbody>
</table>
</div>
</div>


            <!--JQuery and Bootstrap Javascript -->
<script src ="../js/jquery.min.js"></script>
    <script src ="../js/popper.min.js"></script>
    <script src ="../js/bootstrap.min.js"></script>

     <!--Font Awesome js -->
    <script src ="../js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- custom javascript  -->
<script type="text/javascript" src="../js/customLesson.js"></script>

</body>
</html>