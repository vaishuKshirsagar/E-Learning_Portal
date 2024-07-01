<!--Start Footer-->
<div class="footer-body">
  <footer class="bg-dark text-white pt-5 pb-4 mt-5 mb-0">
    <div class="container text-center text-md-left">
      <div class="row text-center text-md-left">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold text-warning">SkillUps</h5>
          <p>Here you can use rows and columns to organise your footer content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, dolorum ducimus at sit optio voluptatum quia, consectetur unde qui repellendus architecto similique omnis error, vitae veritatis eius accusamus eos corrupti </p>
         </div>
         <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
           <h5 class="test-uppercase mb-4 font-weight-bold text-warning">Services</h5>
           <p><a href="#" class="text-white" style="text-decoration:none;"> The Lessons</a>
          </p>
          <p><a href="#" class="text-white" style="text-decoration:none;"> Video Tutorials</a>
          </p>
          <p><a href="#" class="text-white" style="text-decoration:none;"> Quizes</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h5 class="test-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
        <p><a href="#" class="text-white" style="text-decoration:none;">Live classes</a>
          </p>
          <p><a href="#" class="text-white" style="text-decoration:none;">Blogs</a>
          </p>
          <p><a href="#" class="text-white" style="text-decoration:none;">Mentors</a>
          </p>
          <p><a href="#" class="text-white" style="text-decoration:none;">Help</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="test-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
        <p><i class="fas fa-home mr-3"></i> &nbsp;
      H-block, Street no-17, New Delhi- 110001, India</p>
      <p><i class="fas fa-phone mr-3"></i> &nbsp;
      +1 800 123679</p>
      <p><i class="fas fa-envelope mr-3"></i> &nbsp;
      skillups08@gmail.com</p>
      <p><i class="fas fa-print mr-3"></i> &nbsp;
      +98 6846864</p>
      </div>
      </div>
    <hr class="mb-4">
    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p>Copyright 02020 All rights reserved by:
          <a href="#login" data-bs-toggle="modal" data-bs-target="#AdminLoginModal" style="text-decoration:none;">
          <strong class="text-warning">Admin Login</strong>
       </a></p>
</div>
    <div class="col-md-5 col-lg-4">
    <div class="text-center text-md-right">
      <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-facebook"></i></a></li>
          <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-google-plus"></i></a></li>
          <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-linkedin"></i></a></li>
          <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-instagram"></i></a></li>
          <li class="list-inline-item">
          <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px;"><i class="fab fa-youtube"></i></a></li>
        </ul>
     </div>
    </div>
    </div>
</footer>

<!--End Footer-->


<!-- start Registration Modal  -->
<!-- Modal -->
<div class="modal fade" id="RegModal" tabindex="-1" aria-labelledby="RegModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="RegModalLabel">Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="clearRegField()"></button>
      </div>
      <div class="modal-body">
        <!--Start Registration Form -->
      <?php include('./registration.php');?>
      <!--End Registration Form -->
      </div>
      <div class="modal-footer">
          <span id="successMsg"></span>
      <button type="button" class="btn btn-primary" onclick="addUser()" id="signup">Sign Up</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearRegField()">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Registration Modal  -->


<!-- start Login Modal  -->
<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearLogField()"></button>
      </div>
      <div class="modal-body">
        <!--Start login Form -->
      <form id="LoginForm">
  <div class="form-group">
  <i class="fas fa-envelope"></i>
    <label for="logemail" class="pl-2 fw-bold">Email</label>
    <input type="email" class="form-control" placeholder ="Email" name="logemail" id="logemail">
  </div>
  <div class="form-group">
  <i class="fas fa-key"></i>
    <label for="logpass" class="pl-2 fw-bold">Password </label>
    <input type="password" class="form-control" placeholder ="Password" name="logpass" id="logpass">
  </div>
</form>
<!--End login Form -->
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
      <button type="button" class="btn btn-primary" id="logBtn" onclick="checkuserlog()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearLogField()">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End login Modal  -->


<!-- start Admin Login Modal  -->
<!-- Modal -->
<div class="modal fade" id="AdminLoginModal" tabindex="-1" aria-labelledby="AdminLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AdminLoginModalLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearAdminLogField()"></button>
      </div>
      <div class="modal-body">
        <!--Start Admin login Form -->
      <form id="AdminLoginForm">
  <div class="form-group">
  <i class="fas fa-envelope"></i>
    <label for="Adminlogemail" class="pl-2 fw-bold">Email</label>
    <input type="email" class="form-control" placeholder ="Email" name="Adminlogemail" id="Adminlogemail">
  </div>
  <div class="form-group">
  <i class="fas fa-key"></i>
    <label for="Adminlogpass" class="pl-2 fw-bold
    ">Password </label>
    <input type="password" class="form-control" placeholder ="Password" name="Adminlogpass" id="Adminlogpass">
  </div>
</form>
<!--End Admin login Form -->
      </div>
      <div class="modal-footer">
        <small id="statusAdminLogMsg"></small>
      <button type="button" class="btn btn-primary" id="AdminlogBtn" onclick="checkAdminlog()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearAdminLogField()">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- End Admin login Modal  -->

    <!--JQuery and Bootstrap Javascript -->
    <script src ="js/jquery.min.js"></script>
    <script src ="js/popper.min.js"></script>
    <script src ="js/bootstrap.min.js"></script>

     <!--Font Awesome js -->
    <script src ="js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- User Ajax call javascript -->
    <script type="text/javascript" src ="js/ajaxrequest.js"></script>

     <!-- Admin Ajax call javascript -->
     <script type="text/javascript" src ="js/adminrequest.js"></script>

