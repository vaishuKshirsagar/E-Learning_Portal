<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap css -->
    <link rel= "stylesheet" href = "css/bootstrap.min.css">

    <!--Font Awesome css -->
    <link rel= "stylesheet" href = "css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel= "stylesheet" href = "css/style.css">

    <title>SkillUps ELearning</title>
</head>
<body>
   <!--Start Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand ms-2 " href="#">SkillUps</a>
    <span class="navbar-text">Enhance your skills </span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ">
        <ul class="navbar-nav custom-nav  ms-4 ">
          <li class="nav intem custom-nav-item me-2"> <a href="index.php" class= "nav-link">Home </a> </li>
          <li class="nav intem custom-nav-item me-2"> <a href="#services" class= "nav-link">Services </a> </li>
          <li class="nav intem custom-nav-item me-2"> <a href="#aboutUs" class= "nav-link">About Us </a> </li>
          <?php
          session_start();
          if(isset($_SESSION['is_Login'])){
            echo '
            <li class="nav intem custom-nav-item me-3"> <a href="./user/userProfile.php" class= "nav-link">My Profile </a> </li>
          <li class="nav intem custom-nav-item me-3"> <a href="logout.php" class= "nav-link">Logout </a> </li>
            ';
          }
          else{
            echo '<li class="nav intem custom-nav-item me-3"> <a href="#" class= "nav-link" data-bs-toggle="modal" data-bs-target="#LoginModal">Login </a> </li>
            <li class="nav intem custom-nav-item me-3"> <a href="#" class= "nav-link" data-bs-toggle="modal" data-bs-target="#RegModal">Sign up </a> </li>';
          }
          ?>
          <li class="nav intem custom-nav-item me-2"> <a href="#FeedBack" class= "nav-link">Feedback </a> </li> 
          <li class="nav intem custom-nav-item me-3"> <a href="#ContactUs" class= "nav-link">Contact </a> </li>
        </ul>
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      </div>
    </div>
  </div>
</nav>
   <!--End Navigation -->