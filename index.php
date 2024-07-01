<!-- Start include header -->
<?php
include('./mainInclude/header.php');
?>
<!-- End include header -->
   
   <!--Video Carousel-->
   <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner remove-video-margin mb-o p-lg--3">
    <div class="carousel-item active">
      <video playsinline autoplay muted loop>
      <source src="video/vid1.mp4">
</video>
    <div class="vid-overlay"></div>
      <div class="vid-content">
        <h2 class="my-content">Welcome to SkillUps</h2>
        <small class="my-content">Your online study partner.</small><br>
        <?php
        if(!isset($_SESSION['is_Login'])){
          echo ' <a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#RegModal">Get Started</a>';
        }
        else{
          echo ' <a href="./user/userProfile.php" class= "btn btn-primary mt-3">My Profile </a> ';
        }
        ?>
      </div>
    </div>
    <div class="carousel-item">
    <video playsinline autoplay muted loop>
      <source src="video/vid4.mp4">
      </video>
      <div class="vid-overlay"></div>
      <div class="vid-content">
        <h2 class="my-content">Welcome to SkillUps</h2>
        <small class="my-content">Learn and Implement.</small><br>
        <?php
        if(!isset($_SESSION['is_Login'])){
          echo ' <a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#RegModal">Get Started</a>';
        }
        else{
          echo ' <a href="./user/userProfile.php" class= "btn btn-primary mt-3">My Profile </a> ';
        }
        ?>
      </div>
    </div>
    <div class="carousel-item">
    <video playsinline autoplay muted loop>
      <source src="video/vid3.mp4">
      </video>
      <div class="vid-overlay"></div>
      <div class="vid-content">
        <h2 class="my-content">Welcome to SkillUps</h2>
        <small class="my-content">Become a learner everyday.</small><br>
        <?php
        if(!isset($_SESSION['is_Login'])){
          echo ' <a href="#" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#RegModal">Get Started</a>';
        }
        else{
          echo ' <a href="./user/userProfile.php" class= "btn btn-primary mt-3">My Profile </a> ';
        }
        ?>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!--End video background-->

<!--Start text banner-->
<div class = "container-fluid bg-danger txt-banner ">
  <div class = "row bottom-banner ">
    <div class = "col-sm ">
      <h5><i class="fas fa-book-open  text-white mr-10"></i> 6 Online Courses </h5>
</div>
<div class = "col-sm">
      <h5><i class="fas fa-users mr-3 text-white"></i> Video Tutorials </h5>
</div>
<div class = "col-sm">
      <h5><i class="fas fa-keyboard mr-3 text-white"></i> Lifetime Access </h5>
</div>
<div class = "col-sm">
      <h5><i class="fas fa-rupee-sign mr-3 text-white"></i> Free Of Cost </h5>
</div>
</div>
</div>
<!-- End text banner-->

<!--Start Services-->
<div class="services py-5 pt-15" id="services">
<div class="container py-5 text-center text-white " style="height:65vh">
  <h1 class="our-services pt-0 pb-5">Our Services</h1>
<div class="row">

  <div class ="col-md-4 text-center">
  <a href="usersCourses.php" class="btn text-white ">
        <div class="circle">
    <i class="fa fa-desktop" aria-hidden="true"></i>
</div>
<h4 class="service_list">Courses</h4>
<p>Here you will find the courses related to the programming languages and develop coding skills</p>
</a>
</div>
      
<div class ="col-md-4 text-center">
<a href="videoTut.php" class="btn text-white">
         <div class="circle">
        <i class="fa fa-video" aria-hidden="true"></i>
</div>
<h4 class="service_list">Video Tutorials</h4>
<p>Here you will find the video related to the programming languages and develop coding skills</p>
</a>
</div>
<div class ="col-md-4 text-center">
<a href="solveQuiz.php" class="btn text-white">
        <div class="circle">
        <i class="fa fa-clipboard" aria-hidden="true"></i>
</div>
<h4 class="service_list">Quizes</h4>
<p>Here you will find the quizes related to the programming languages and develop coding skills</p>
      </a>
</div>
</div>
</div>
<!--End Services-->

<!--Start About Us-->
<div class="about-section text-center" id="aboutUs">
		<div class="about-container">
			<div class="content-section">
				<div class="about-title">
					<h1>About Us</h1>
				</div>
				<div class="about-content">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
			<div class="image-section">
				<img src="image/aboutus.jpg">
			</div>
      <div class="about-social mt-5">
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        </div>
		</div>
	</div>

<!--End About Us-->

<!-- Start include Contact Us  -->
<?php
include('contactUs.php');
?>
<!-- End include Contact us  -->

<!-- Start include Contact Us  -->
<?php
include('feedback.php');
?>
<!-- End include Contact us  -->

<!-- Start include footer  -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End include footer  -->

</body>
</html>

