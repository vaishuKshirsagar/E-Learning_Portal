<!-- Start include header -->
<?php
include('./mainInclude/header.php');
include('./dbConnection.php');
?>
<!-- End include header -->


<!-- course Page banner  -->
<div class=" container-fluid bg-dark">
<div class="row">
  <img src="./image/servicesb.jpg" alt="courses" style="height: 500px; width:100%; object-fit:cover;
  box: shadow 10px;"/>
  </div>
</div>
 <!-- end course Page Banner  -->

<!-- Start Quiz -->
<div class="container-fluid">

<h1 class="text-center mt-5">Quizes</h1>
<!-- <div class="card-group row mx-5 py-4 " style="margin-top:80px;background-color:#ddd;"> -->
  <div class="row mt-4 mx-5 py-4">

<?php
$sql="SELECT * FROM course_details";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $course_id=$row['course_id'];
        echo '


  <div class="col-sm-4 mb-4">
    <div class="card mx-3" style="border: 1px solid rgb(10 10 10 /30%);"> 
    <img src="'. str_replace('..','.',$row['course_img']).'" class="card-img-top my-2" alt="..." style="height: 150px; width:150px ;margin-left:auto; margin-right:auto">
    <div class="card-body">
      <h5 class="card-title">'.$row['course_name'].'</h5>
      <p class="card-text">'.$row['course_desc'].'</p>
      <div class="card-footer text-center " style="height:55px">';?>
      <form action="checkoutQuiz.php" method="POST">
        <div class="text-center">
      <button type="submit" class="btn btn-primary text-white fw-bold" name="solveQuiz" id="solveQuiz"><i class="fa fa-play-circle me-2"></i>Solve Quiz</button>
      <input type="hidden" name="courseid" id="courseid" value="<?php echo $row['course_id']?>">
    </div>
</form>
      </div>
    </div>
  </div>
</div>

<?php
}
}
?> 
</div>    
</div>
<!-- Start include footer  -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End include footer  -->