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

<!-- start Main Content -->
<div class="container mt-5">
  <?php
  
  if(isset($_GET['course_id'])){
    $course_id=$_GET['course_id'];
    $sql="SELECT * FROM course_details WHERE course_id='$course_id'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
  }
  
  ?>

<div class="row " style="margin-left:200px;">
    <div class="col-md-2">
    <img src="<?php echo str_replace('..','.',$row['course_img'])?>" class="card-img-top " alt="..." style="height: 150px; width:150px ;">  
</div>
<div class="col-md-8">
  <div class="card-body">
    <h5 class="card-title">Course Name:<?php echo $row['course_name']?></h5>
    <p class="card-text">Description: <?php echo $row['course_desc']?></p>
    <form action="checkoutVideotut.php" method="POST">
      <button type="submit" class="btn btn-primary text-white fw-bold float-end" name="takeCourse" id="takeCourse"><i class="fa fa-play-circle me-2"></i>Take Tutorial</button>
      <input type="hidden" name="courseid" id="courseid" value="<?php echo $row['course_id']?>">
</form>
</div>
</div>
</div>

<div class="container mt-3 " style=" margin-left:200px">
  <div class="row">
  <table class="table table-bordered table-hover" style="width: 1000px;"> 
      <thead>
        <tr>
          <th scope="col">Topic No.</th>
          <th scope="col">Topic Name</th>
</tr>
</thead>
  <tbody>
    <?php  
    $sql ="SELECT * FROM video_tutorials WHERE course_id='$course_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
      $num=0;
      while($row=$result->fetch_assoc()){
        $num++;
      echo ' <tr>
      <th scope="row">'.$num.'</th>
      <td>'.$row['video_topic'].'</td>
</tr>';
      }
    }
    ?>
   
   
</tbody>
</table>
</div>
</div>
</div>

<!-- Start include footer  -->
<?php
include('./mainInclude/footer.php');
?>
<!-- End include footer  -->