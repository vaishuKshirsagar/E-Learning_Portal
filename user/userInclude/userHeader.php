<?php 
include_once('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_Login'])){
    $logemail= $_SESSION['logemail'];
}
else{
echo "<script> location.href='../index.php';
</script>";
}
if(isset($logemail)){
    $sql="SELECT user_img FROM user_details WHERE user_email='$logemail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $user_img=$row['user_img'];  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
   <!-- Top Navbar  -->
   <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="userProfile.php">E-Learning
        <small class="text-white">User Area</small></a>
</nav>
     <!-- Side Bar  -->
     <div class="container-fluid mb-5" style="margin-top:40px;" >
     <div class="row">
         <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
             <div class="sidebar-sticky">
                 <ul class="nav flex-column">
                 <li class="nav-item mb-3">
                     <?php
                 if(isset($logemail)){
    $sql="SELECT user_img FROM user_details WHERE user_email='$logemail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $user_img=$row['user_img'];
    ?>
    <img src="<?php echo $user_img; ?>" alt="userImage" class="img-thumbnail rounded-circle " style="margin-left:10px">
    <?php
}
?>
                         
                         </li>
                     <li class="nav-item">
                         <a class="nav-link" href="userProfile.php">
                             <i class="fas fa-user"></i>
                           <strong> Profile</strong><span class="sr-only">(current)</span>
                          </a>
                         </li>
                          <li class="nav-item">
                              <a class="nav-link" href="myCourses.php">
                                  <i class="fas fa-laptop-code"></i>
                                  <strong>   My Courses </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="myVideoTut.php">
                                  <i class="fa fa-play-circle"></i>
                                  <strong>  My Video Tutorial </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="myQuiz.php">
                                  <i class="fas fa-award"></i>
                                  <strong>  Quiz </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="userFeedback.php">
                                  <i class="fas fa-comments"></i>
                                  <strong> Feedback </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="userChangePass.php">
                                  <i class="fas fa-key"></i>
                                  <strong>Change Password </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="../logout.php">
                                  <i class="fas fa-sign-out-alt"></i>
                                  <strong> Logout </strong>
                              </a> 
                         </li>
</ul>
</div>
</nav>

