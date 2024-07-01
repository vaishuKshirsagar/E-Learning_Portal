<?php
$db_host= "localhost";
$db_user= "root";
$db_password= "";
$db_name= "e-learning_db";

//create conncetion

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

//Check Conncetion
if($conn->connect_error){
    die("Connection Failed");
}
//else{
    //echo"Connected";
//}
?>
