<?php
include('./mainInclude/header.php');
include('./dbConnection.php');
?>
<!-- course Page banner  -->
<div class=" container-fluid bg-dark">
<div class="row">
  <img src="./image/servicesb.jpg" alt="courses" style="height: 500px; width:100%; object-fit:cover;
  box: shadow 10px;"/>
  </div>
</div>

<div class="container jumbotron mb-5 mt-5 "style="height:auto ;background-color:#E8E8E8;">
    <div class="row">
        <div class="col-md-4" style="padding:30px">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form  role="form" id="LoginForm">
  <div class="mb-4">
  <i class="fas fa-envelope"></i>
    <label for="logemail" class="pl-2 fw-bold">Email</label>
    <input type="email" class="form-control" placeholder ="Email" name="logemail" id="logemail">
  </div>
  <div class="mb-4">
  <i class="fas fa-key"></i>
    <label for="logpass" class="pl-2 fw-bold">Password </label>
    <input type="password" class="form-control" placeholder ="Password" name="logpass" id="logpass">
  </div>
  <div class="mb-4">
  <button type="button" class="btn btn-primary" id="logBtn" onclick="checkuserlog()">Login</button>
</div>
</form>
<br/>
<small  id="statusLogMsg"></small>
</div>


<div class="col-md-6 offset-md-1" style="padding:30px">
<h5 class="mb-3">New User !! Sign Up</h5>
<form role="form" id="RegForm">
  <div class="mb-4">
<i class="fas fa-user"></i>
     <label for="uname" class="pl-2 fw-bold">Name</label>
     <small id="statusMsg1"></small>
    <input type="text" class="form-control" placeholder ="Name" name="uname" id="uname"> 
  </div>
  <div class="mb-4">
  <i class="fas fa-envelope"></i>
    <label for="uemail" class="pl-2 fw-bold">Email</label>
    <small id="statusMsg2"></small>
    <input type="email" class="form-control" placeholder ="Email" name="uemail" id="uemail">
    <small class="form-text">We'll never share your email with anyone else.</small>
  </div>
  <div class="mb-4">
  <i class="fas fa-key"></i>
    <label for="upass" class="pl-2 fw-bold">Create Password </label>
    <small id="statusMsg3"></small>
    <input type="password" class="form-control" placeholder ="Password" name="upass" id="upass">
  </div>
  <div class="mb-4">
  <button type="button" class="btn btn-primary" onclick="addUser()" id="signup">Sign Up</button>
</div>
</form>
<br/>
<small id="successMsg"></small>
</div>
</div>
</div>
<hr/>



<!-- Start include footer  -->
<?php
include('./contactUs.php');
include('./mainInclude/footer.php');
?>
<!-- End include footer  -->