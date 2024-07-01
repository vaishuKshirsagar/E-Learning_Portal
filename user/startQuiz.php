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
    <div class="container-fluid  p-2" style="margin-left:10px;  background-color: #225470;">
        <h3  class=" text-center text-white p-2">Welcome to SkillUps</h3>
        <a class="btn btn-danger" href="./myQuiz.php"> My Quiz</a>
</div>

<div class="container-fluid">
<?php
                if(isset($_GET['course_id'])){
                    $course_id=$_GET['course_id'];
                    $sql="SELECT * FROM quiz WHERE course_id='$course_id'";
                    $result=$conn->query($sql);
                    $row=$result->fetch_assoc();
                    
                }
                ?>
            <div class="text-center">     
            <iframe src="<?php  echo $row['quizLink'];?>" width="700" height="1000" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div>
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
<script type="text/javascript" src="../js/custom.js"></script>

</body>
</html>