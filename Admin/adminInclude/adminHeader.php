<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">E-Learning
        <small class="text-white">Admin Area</small></a>
</nav>
     <!-- Side Bar  -->
     <div class="container-fluid mb-5" style="margin-top:60px;" >
     <div class="row">
         <nav class="col-sm-3 col-md-2 sidebar py-5d-print-none" style=" height:450px;background-color:#F5F5F5;">
             <div class="sidebar-sticky">
                 <ul class="nav flex-column">
                     <li class="nav-item">
                         <a class="nav-link" href="adminDashboard.php">
                             <i class="fas fa-tachometer-alt"></i>
                            <strong> Dashboard</strong>
                          </a>
                         </li>
                          <li class="nav-item">
                              <a class="nav-link" href="courses.php">
                                  <i class="fas fa-laptop-code"></i>
                                <strong> Manage Courses</strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="videoTutorial.php">
                                  <i class="fa fa-play-circle"></i>
                                 <strong> Manage Video Tutorial</strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="Quiz.php">
                                  <i class="fas fa-award"></i>
                                  <strong> Manage  Quiz</strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="manageUser.php">
                                  <i class="fas fa-users"></i>
                                  <strong> Manage User </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="manageFeedback.php">
                                  <i class="fas fa-pen-alt"></i>
                                  <strong> Manage Feedback </strong>
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="adminChangePass.php">
                                  <i class="fas fa-key"></i>
                                  <strong>Change Password</strong> 
                              </a> 
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="../logout.php">
                                  <i class="fas fa-sign-out-alt"></i>
                                  <strong> Logout</strong>
                              </a> 
                         </li>
</ul>
</div>
</nav>