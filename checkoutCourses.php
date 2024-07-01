<?php 
include('./dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['logemail'])){
echo "<script>location.href='loginorsignup.php'</script>";
}
else{

$Useremail=$_SESSION['logemail'];
if(isset($_REQUEST['courseid'])){
    $course_id=$_REQUEST['courseid'];
    $sql="SELECT course_name FROM course_details  WHERE course_id='$course_id'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $course_name=$row['course_name'];

//checking if course alrady enrolled 
$sql="SELECT * FROM enrolled_courses WHERE userEmail='$Useremail'";
$result=$conn->query($sql);
$ischeck=0;
if($result->num_rows>0){


    while($row=$result->fetch_assoc()){

        if($_REQUEST['courseid']==$row['courseId'])
        {
          
            $ischeck=true;
            break;
        }
    } 
    if($ischeck==true){
        echo "<script>window.location.href='./user/myCourses.php' </script>";

    }
        else{
            $sqll="INSERT INTO enrolled_courses(courseId ,courseName,userEmail) VALUES('$course_id', ' $course_name', '$Useremail')";
            if($conn->query($sqll) == TRUE){
             echo "<script>setTimeout(()=>{
                window.location.href='./user/myCourses.php';},1500);
                </script>";
            
        
            }
        }

}
else{
    $sqll="INSERT INTO enrolled_courses(courseId ,courseName,userEmail) VALUES('$course_id', ' $course_name', '$Useremail')";
    if($conn->query($sqll) == TRUE){
        echo "<script>setTimeout(()=>{
        window.location.href='./user/myCourses.php';},1500);
        </script>";

    }
}
  
  }
}
?>